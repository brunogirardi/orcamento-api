<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\OrcamentoBdi;

class Orcamento extends Resource
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
            'endereco' => $this->endereco,
            'cliente' => $this->cliente,
            'contrato' => $this->contrato,
            'data_base' => $this->data_base,
            'ls_hora' => $this->ls_hora,
            'ls_mes' => $this->ls_mes,
            'bdi' => OrcamentoBdi::collection($this->whenLoaded('bdi'))
        ];
        // return parent::toArray($request);
    }
}
