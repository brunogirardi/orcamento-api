<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class insumos extends Model
{
    
    public function tipos() {
        
        return $this->belongsTo(tipos::class, 'tipos_id');

    }

    public function items() {

        return $this->hasMany(cpu_items::class, 'insumos_cpu_id');

    }


    public function dados() {
        
        return $this->belongsTo(cpu_items::class, 'insumos_item_id');

    }

}
