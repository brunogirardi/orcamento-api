<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insumos;
use App\Http\Resources\Cpus as cpusResource;
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

        return new cpusResource($insumo);

    }

    function index() {
        
        return cpusResource::collection(Insumos::where('tipos_id', 6)->with('tipos')->get());

    }

    function show($id) {

        $cpu = Insumos::where('id', $id)->with('items')->first();

        if ($cpu->tipos_id == 6){
            return new cpusResource($cpu);
        } else {
            return response('Item invalido', 404);
        }

    }

    function update(Request $request, $id) {
        
        $insumo = Insumos::find($id);

        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = $request->cst_total;

        $insumo->save();

        return new cpusResource($insumo);

    }

    function destroy($id) {

        $cpu = Insumos::find($id);
        
        if ($this->isCpu($cpu)){
            $cpu->delete();
            return response(null, 204);
        } else {
            return response('Item removido com sucesso', 204);
        }
        

    }

    // Funções utilitárias

    private function isCpu($cpu) {

        if (!is_null($cpu)){
            if ($cpu->tipos_id == 6){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

}
