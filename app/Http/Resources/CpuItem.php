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
            'insumos_id' => $this->insumos_item_id,
            'descricao' => $this->dados->descricao,
            'unidade' => $this->dados->unidade,
            'tipos_id' => $this->dados->tipos_id,
            'tipo' => $this->dados->tipos->nome,
            'quantidade' => $this->coeficiente,
            'cst_total' => $this->dados->cst_total,
            'cst_mo' => $this->dados->cst_mo,
            'cst_outros' => $this->dados->cst_outros
        ];
    }
}
