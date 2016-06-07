<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_jenis extends Model
{
    public function jeniss(){
    	return $this->hasMany('\App\jenis','codejenis','code');
    }
}
