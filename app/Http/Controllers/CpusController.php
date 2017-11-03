<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insumos;
use App\Http\Resources\Insumos as InsumosResource;
use App\Http\Requests\StoreCpusRequests;

class CpusController extends Controller
{
    function store(Request $request) {
        
        $insumo = new Insumos();

        $insumo->tipos_id = 6;
        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = 0;

        $insumo->save();

        return new InsumosResource($insumo);

    }

    function index() {
        
        return InsumosResource::collection(Insumos::where('tipos_id', 6)->get());

    }

    function show($id) {

        return new InsumosResource(Insumos::find($id));

    }

    function update(Request $request, $id) {
        
        $insumo = Insumos::find($id);

        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = $request->cst_total;

        $insumo->save();

        return new InsumosResource($insumo);

    }

    function destroy($id) {

        Insumos::destroy($id);
        
        return response(null, 204);

    }
}
