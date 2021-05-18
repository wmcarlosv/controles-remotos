<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'controls';

    public function block(){
    	return $this->belongsTo('App\Models\Block');
    }

    public function department(){
    	return $this->belongsTo('App\Models\Department');
    }
}
