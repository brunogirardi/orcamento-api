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
            'tipos_id' => $this->tipos_id,
            'cst_total' => $this->cst_total,
            'cst_mo' => $this->cst_mo,
            'cst_outros' => $this->cst_outros,
            'itens' => CpuItem::collection($this->whenLoaded('items'))
        ];
    }
}
