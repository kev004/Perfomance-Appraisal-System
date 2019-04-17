<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name','phone_number'];

    public function admin()
    {
        return $this->hasMany('App\User','admin_id');
}
}