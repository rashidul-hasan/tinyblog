<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Rashidul\RainDrops\Model\RainDropsSupport;
use SendGrid\Mail\Mail;

class User extends Authenticatable
{

    const ADMIN = 1;
    const SUBSCRIBER = 2;
    const MEMBER = 3;

    const STATUS_CREATED = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_SUSPENDED = 3;

    use RainDropsSupport, Notifiable;

    protected $fillable = [
	    'name',
	    'email',
	    'password',
        'status',
        'role',
        'is_enabled',
        'stripe_customer_id'
	];

    protected $casts = [
        'role' => 'integer',
    ];

    protected $baseUrl = 'admin/users';
    protected $entityName = 'User';
    protected $entityNamePlural = 'Users';

    public function scopeMembers($query)
    {
        return $query->where('role', static::MEMBER);
    }

    public function scopeSubscribers($query)
    {
        return $query->where('role', static::SUBSCRIBER);
    }

    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }

    public function isAdmin()
    {
        return $this->role === self::ADMIN;
    }

    public function fetchGravatar()
    {
        $hash = md5( strtolower( trim( $this->email) ) );
        return "https://www.gravatar.com/avatar/" . $hash;
    }

    public function softwares()
    {
        return $this->belongsToMany(Software::class);
    }

    public function getSoftwareIdsAttribute()
    {
        return $this->softwares->pluck('id');
    }

    public function sendPasswordResetNotification($token)
    {
        $link = url('password/reset', $token);
        if ($this->isAdmin()){
            $link = url('admin/password/reset', $token);
        }
        // TODO move mail sending code to a sperate service class
        $html = view('emails.reset-password', ['user' => $this, 'link' => $link])->render();
        $email = new Mail();
        $email->setFrom(config('mail.from.address'), config('mail.from.name'));
        $email->setSubject("Reset password");
        $email->addTo($this->email, $this->name);
        $email->addContent( "text/html", $html);
        $sendgrid = new \SendGrid(config('services.sendgrid.key'));
        try {
            $response = $sendgrid->send($email);
            // TODO send proper error

            // if success, send to pass reset page
            if ($this->isAdmin()){
                return redirect('/admin/password/email')->with('status', 'We sent a password reset link to your email.');
            } else {
                return redirect('/reset-password')->with('status', 'We sent a password reset link to your email.');
            }

        } catch (\Exception $e) {
            // TODO send proper error
            if ($this->isAdmin()){
                return redirect('/admin/password/email')->with('error', 'We could not send the password reset link to your email.Please try again.');
            } else {
                return redirect('/reset-password')->with('error', 'We could not send the password reset link to your email.Please try again.');
            }

        }
    }

    protected $fields = [
	    'name' => [
	        'label' => 'Full Name',
	        'type' => 'text',
            'validations' => 'required',
            'index' => true
	    ],
	    'email' => [
	        'label' => 'Email',
	        'type' => 'email',
            'validations' => 'required',
            'index' => true
        ],
        'role' => [
	        'label' => 'User Type',
	        'type' => 'text',
            'index' => true,
            'form' => false
        ],
        'stripe_customer_id' => [
	        'label' => 'Stripe Customer ID',
	        'type' => 'text',
            'index' => true,
            'form' => false
        ],
        'verified' => [
            'label' => 'Verification',
            'type' => 'text',
            'index' => true,
            'form' => false
        ],
        'is_enabled' => [
            'label' => 'Account Status',
            'type' => 'text',
            'index' => true,
            'form' => false
        ],
	    'password' => [
	        'label' => 'Password',
	        'type' => 'text',
            'form' => false
	    ]
	];



}
