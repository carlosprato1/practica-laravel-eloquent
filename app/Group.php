<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
        public function users(){   // exactamente no importa el nombe de la funcion
          return $this->belongsToMany(User::class)->withTimestamps();
       }
}
