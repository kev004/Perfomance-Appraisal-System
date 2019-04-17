<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'branch_id','department_id', 'password', 'nationality', 'date_of_birth', 'gender', 'marital_status', 'id_number', 'mobile_number', 'next_of_kin', 'next_of_kin_id_no', 'address', 'employment_status', 'linkedin_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

     public function branch()
    {
        return $this->belongsTo('App\Branch','branch_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department','department_id');
    }

    /*  Role User Relationship
    |--------------------------------------------------------------------------| */
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $name) return true;
        }
        return false;
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }
}
