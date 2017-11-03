<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class insumos extends Model
{
    
    public function tipos() {
        
        return $this->belongsTo(tipos::class, 'tipos_id');

    }

    public function insumos() {
        
        $this->hasMany(cpu_itens::class);
        
    }

}
