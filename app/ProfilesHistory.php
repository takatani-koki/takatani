<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilesHistory extends Model
{
   protected $table = 'profileshistories';
  protected $guarded = array('id');

    public static $rules = array(
        'profiles_id' =>'required',
        'edited_at' => 'required',
);
}
