<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object1 extends Model
{
   protected $table = 'Object';
   protected $fillable=['id','name','address','obj_id','pult_id','chop_id'];
   public $timestamps = false;
	
  public function chop()
  {
    return $this->hasOne('App\Chop', 'id', 'chop_id');
  }	
	
	
}
