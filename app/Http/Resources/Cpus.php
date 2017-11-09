<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Cpus extends Resource
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
            'tipo' => $this->tipos->nome,
            'cst_total' => $this->cst_total,
            'itens' => CpuItem::collection($this->whenLoaded('items'))
        ];
    }
}
