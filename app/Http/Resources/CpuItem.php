<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CpuItem extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'descricao' => $this->dados->descricao,
            'unidade' => $this->dados->unidade,
            'tipo' => $this->dados->tipos->nome,
            'quantidade' => $this->coeficiente,
            'valor' => $this->dados->cst_total,
            // 'total' => round($this->dados->cst_total * $this->coeficiente, 2)
        ];
    }
}
