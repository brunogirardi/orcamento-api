<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class cpu_itens extends Model
{
    
    public function cpu() {
        
        return $this->belongsTo(insumos::class, 'insumos_cpu_id');

    }

    public function insumo() {
        
        return $this->belongsTo(insumos::class, 'insumos_item_id');

    }

}
