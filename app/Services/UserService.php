<?php
/**
 * Created by PhpStorm.
 * User: Rashidul Hasan
 * Date: 1/26/2018
 * Time: 5:06 PM
 */

namespace App\Services;


use App\Models\User;

class UserService
{
    protected $roleName = [
        User::SUPER_ADMIN => 'Super Admin',
        User::ADMIN => 'Admin',
        User::AUTHOR => 'Author',
    ];

    protected $statusName = [
        User::STATUS_CREATED => 'Created',
        User::STATUS_ACTIVE => 'Active',
        User::STATUS_SUSPENDED => 'Suspended',
    ];


    public function getRoleName($role)
    {
        return $this->roleName[$role];
    }

    public function getStatusName($status)
    {
        $class_name = 'label_' . $status;
        $label_markup = '<small class="label %s">%s</small>';
        return sprintf($label_markup, $class_name, $this->statusName[$status]);
    }

}