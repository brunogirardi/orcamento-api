<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cpu_itens;

class CpuItensController extends Controller
{

    function store(Request $request, $id) {
        
        $item = new cpu_itens();

        $item->insumos_cpu_id = $id;
        $item->insumos_item_id = $request->insumo;
        $item->quantidade = $request->quantidade;

        $item->save();

        return new InsumosResource($item);

    }

}
