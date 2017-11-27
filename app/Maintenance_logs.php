<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance_logs extends Model
{
    public function maintenance_records()
    {
        return $this->hasOne('App\Equipment', 'equipment_id');
	}	
}
