<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insumos;
use App\Models\cpu_items;
use App\Http\Resources\Cpus as cpusResource;
use App\Http\Resources\Generico;
use App\Http\Requests\StoreCpusRequests;
use Illuminate\Support\Facades\DB;

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
            DB::statement("call CpuDeletar({$id});");
            return response('Item removido com sucesso', 204);
        } else {
            return response('Item invalido', 404);
        }
        
    }

    function fullStore(Request $request) {

        $insumo = new Insumos();
        
        $insumo->tipos_id = 6;
        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = $request->cst_total;
        $insumo->cst_mo = $request->cst_mo;
        $insumo->cst_outros = $request->cst_outros;

        $insumo->save();
        
        foreach ($request->itens as $elemento) {

            // Ignora itens com status de Excluido
            if($elemento['status'] != 2) {

                // Salva no banco de dados
                $item = new cpu_items();
    
                $item->insumos_cpu_id = $insumo->id;
                $item->insumos_item_id = $elemento['insumos_id'];
                $item->coeficiente = $elemento['quantidade'];
        
                $item->save();

            }

        }

        $cpu = Insumos::where('id', $insumo->id)->with('items')->first();
        return new cpusResource($cpu);

    }

    function fullUpdate(Request $request, $id) {

        $insumo = Insumos::find($request->id);
        
        $insumo->descricao = $request->descricao;
        $insumo->unidade = $request->unidade;
        $insumo->cst_total = $request->cst_total;
        $insumo->cst_mo = $request->cst_mo;
        $insumo->cst_outros = $request->cst_outros;

        $insumo->save();
        
        foreach ($request->itens as $elemento) {

            // Adiciona itens novos a CPU
            if ($elemento['status'] == 3) {
                $item = new cpu_items();
                $item->insumos_cpu_id = $insumo->id;
                $item->insumos_item_id = $elemento['insumos_id'];
                $item->coeficiente = $elemento['quantidade'];
                $item->save();
            }

            // Atualiza itens já presentes na CPU
            else if ($elemento['status'] == 1) {
                $item = cpu_items::find($elemento['id']);
                $item->coeficiente = $elemento['quantidade'];
                $item->save();
            }

            // Remove itens apagados da CPU
            else if ($elemento['status'] == 2) {
                if ($elemento['id'] != null) {
                    cpu_items::destroy($elemento['id']);
                }
            }
            
        }

        $cpu = Insumos::where('id', $insumo->id)->with('items')->first();
        return new cpusResource($cpu);

    }

    function duplicate($id) {

        $resposta = DB::select("call CpuDuplicar({$id});");
 
        $cpu = Insumos::where('id', $resposta[0]->nova_cpu)->with('items')->first();
        return new cpusResource($cpu);

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
