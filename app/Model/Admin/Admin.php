<?php

namespace Devmus\Model\Admin;

use Devmus\Model\Admin\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable =['name','email','password','status','phone'];



    protected $hidden = ['password','remember_token'];



    // Accessor

    public function getNameAttribute($name)
    {

    	return ucfirst($name);
    }



    public function roles()
    {
    	return $this->belongsToMany(Role::class);

    }


    public function posts()
   {
        return $this->hasMany('Devmus\Model\Admin\Blog\Post');
   }



}
