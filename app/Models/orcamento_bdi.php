<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orcamento_bdi extends Model
{
    
    protected $table = "orcamento_bdi";

    public function bdi() {
        return $this->belongsTo(orcamento::class, 'orcamento_dados_id');
    }

}
