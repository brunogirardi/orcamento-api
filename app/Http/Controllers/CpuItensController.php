<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cpu_items;
use App\Http\Resources\CpuItem as itemResource;

class CpuItensController extends Controller
{

    function store(Request $request, $cpu) {
        
        $item = new cpu_itens();

        $item->insumos_cpu_id = $cpu;
        $item->insumos_item_id = $request->insumo;
        $item->quantidade = $request->quantidade;

        $item->save();

        return new InsumosResource($item);

    }

    function show($cpu) {
        
        $items = cpu_items::where('insumos_cpu_id', $cpu)->get();
        
        return itemResource::collection($items);

    }

    function update(Request $request, $cpu, $item) {
        
        $item = cpu_items::find($item);

        $item->coeficiente = $request->quantidade;

        $item->save();

        return new itemResource($item);

    }

    function destroy($item) {

        cpu_items::find($item);
        return response('Item removido com sucesso', 204);

    }

}
 