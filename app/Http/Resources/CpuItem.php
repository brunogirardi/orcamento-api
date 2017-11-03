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
            'descricao' => $this->descricao,
            'unidade' => $this->unidade,
            'quantidade' => $this->quantidade,
            'tipo' => $this->tipos->nome,
            'valor' => $this->cst_total
        ];
    }
}
