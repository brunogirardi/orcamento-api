<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orcamento extends Model
{
    
    // Sets the reference table
    protected $table = "orcamento_dados";

    #region Relacional com orcamento_bdi
    
    public function bdi() {
        return $this->hasMany(orcamento_bdi::class, 'orcamento_dados_id');
    }

    #endregion

}
