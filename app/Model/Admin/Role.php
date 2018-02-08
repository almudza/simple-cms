<?php

namespace Devmus\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    protected $fillable = [ 'name'];



    // relastionship

    public function permissions()
    {
    	return $this->belongsToMany('Devmus\Model\Admin\Permission');
    }
}
