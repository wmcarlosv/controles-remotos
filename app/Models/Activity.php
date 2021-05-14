<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    public function block(){
    	return $this->belongsTo('App\Models\Block');
    }

    public function department(){
    	return $this->belongsTo('App\Models\Department');
    }

    public static function getActivityByNumberControl($numberControl){
    	return DB::table("activities")->get();
    }
}
