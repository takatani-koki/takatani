<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
  #php laravel 15 追記
  protected $guarded=array('id');

  public static $rules=array(
    'title'=>'required',
    'body'=>'required',
  );
  #php laravel 15 終了

  public function histories()
  {
    return $this->hasMany('App\History');
  }
}
