<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\User;
use Rashidul\RainDrops\Controllers\BaseController;

class UsersController extends BaseController
{

    protected $modelClass = User::class;
    protected $indexView = 'users.table';
    protected $editView = 'users.form';

    public function __construct()
    {
        parent::__construct();
        $this->crudAction->restrictActions(['view']);
    }

    public function querying()
    {
        $this->dataTableQuery->where('role', '!=', User::ADMIN);
        /*$this->dataTableObject->editColumn('action', function ($item) {
            return '<a href="'. $item->getEditUrl() .'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> </a>' .
                '';
        });*/
        $this->dataTableObject->editColumn('role', function ($item) {
            if ($item->role === User::SUBSCRIBER){
                return '<span class="label bg-yellow">Subscriber</span>';
            }
            if ($item->role === User::MEMBER){
                return '<span class="label bg-blue">Member</span>';
            }
        })
        ->editColumn('verified', function ($item) {
            if ($item->verified){
                return '<span class="label bg-green">Verified</span>';
            }
            return '<span class="label bg-red">Unverified</span>';

        })
        ->editColumn('is_enabled', function ($item) {
            if ($item->is_enabled){
                return '<span class="label bg-green">Enabled</span>';
            }
            return '<span class="label bg-red">Disabled</span>';

        });
    }

    public function editing()
    {
        $this->viewData['softwares'] = Software::all();
        $this->viewData['user_softwares'] = $this->model->software_ids->toArray();
    }

    public function updating()
    {
        $this->model->role = $this->request->get('role');
        $this->model->verified = $this->request->has('verified') ? true : false;
        $this->model->is_enabled = $this->request->has('is_enabled') ? true : false;

        if ($this->request->has('softwares')) {
            $softwares = $this->request->get('softwares');
            $this->model->softwares()->sync($softwares);
        } else {
            $this->model->softwares()->sync([]);
        }
    }

    public function updated()
    {
        $this->viewData['redirect'] = url('admin/users');
    }
}
