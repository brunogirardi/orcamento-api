<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insumos;
use App\Http\Resources\Insumos as InsumosResource;
use App\Http\Requests\StoreInsumosRequests;
use Illuminate\Support\Facades\DB;

class InsumosController extends Controller
{

    function store(Request $request) {

        $insumo = new Insumos();

        $insumo->tipos_id = $request->tipos_id;
        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = $request->cst_total;

        $insumo->save();

        return new InsumosResource($insumo);

    }

    function index() {
        //return InsumosResource::collection(Insumos::where('tipos_id', '<>', 6)->get());
        return InsumosResource::collection(Insumos::all());
    }


    function show($id) {
        return new InsumosResource(Insumos::find($id));
    }

    function update(Request $request, $id) {

        $insumo = Insumos::find($id);

        $insumo->tipos_id = $request->tipos_id;
        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = $request->cst_total;

        $insumo->save();

        DB::statement(DB::raw("set @@max_sp_recursion_depth = 255;"));
        DB::statement(DB::raw("call update_cpu_valor_unitario({$id});"));

        return new InsumosResource($insumo);

    }

    function destroy($id) {

        Insumos::destroy($id);
        
        return response(null, 204);

    }

}
