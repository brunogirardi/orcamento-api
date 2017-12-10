<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orcamento_items extends Model
{

    public function insumos() {
        
        return $this->belongsTo(insumos::class, 'insumos_id');

    }

}
