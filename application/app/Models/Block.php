<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $table = 'blocks';

    public function departments(){
    	return $this->hasMany('App\Models\Department');
    }

    public function controls(){
    	return $this->hasMany('App\Models\Control');
    }
}
