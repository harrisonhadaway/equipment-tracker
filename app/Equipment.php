<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';

    public function myEquipment() {
    return $this->belongsTo('App\User', 'owner_id');
  	}
}
 