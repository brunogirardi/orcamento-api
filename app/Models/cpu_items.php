<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class cpu_items extends Model
{

    public function items() {
        
        return $this->belongsTo(insumos::class);

    }

    public function dados() {
        
        return $this->belongsTo(insumos::class, 'insumos_item_id');

    }

}
