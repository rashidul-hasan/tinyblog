<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use SendGrid\Mail\Mail;

class EmailController extends Controller
{

    public function showEmailForm()
    {
        $data = [
            'title' => 'Send Email'
        ];

        return view('send-email', $data);
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'send_to' => 'required'
        ]);

        $from_address = $request->has('from_address')
            ? $request->get('sent_from')
            : config('mail.from.address');

        $from_name = $request->has('from_name')
            ? $request->get('sent_from')
            : config('mail.from.name');

        // TODO move mail sending code to a sperate service class
        $html = view('emails.blank', ['body' => $request->get('body')])->render();

        $email = new Mail();
        $email->setFrom($from_address, $from_name);
        $email->setSubject($request->get('subject'));
        $email->addContent( "text/html", $html);
        $sendgrid = new \SendGrid(config('services.sendgrid.key'));

        $users = $this->getUsers($request->get('send_to'));

        if ($users){
            foreach ($users as $user) {
                // TODO check if user has name & email
                $email->addTo($user->email, $user->name);
            }
        }

        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() === 202){
                // success
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);

        } catch (\Exception $e) {
            // TODO send proper error
            return response()->json(['success' => false]);
        }

    }

    private function getUsers($who)
    {
        $users = null;
        switch ($who){
            case 'users' :
                $users = User::all();
                break;

            case 'member' :
                $users = User::members()->get();
                break;

            case 'subscriber' :
                $users = User::subscribers()->get();
                break;
        }

        return $users;
    }
}