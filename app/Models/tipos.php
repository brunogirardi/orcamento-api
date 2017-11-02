<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipos extends Model
{

    public function insumos() {
        
        $this->hasMany(insumos::class);
        
    }

}
