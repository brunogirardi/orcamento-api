<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orcamento_items;
use App\Http\Resources\OrcamentoItem as OrcamentoItemResource;
use Illuminate\Support\Facades\DB;

class OrcamentoItemController extends Controller
{
    function index($orcamento) {
        $query =   "SELECT * 
                    FROM orcamento_items as o
                    LEFT JOIN insumos as i ON i.id = o.insumos_id
                    WHERE o.orcamento_dados_id =" . $orcamento;

        //dd($query);

        return OrcamentoItemResource::collection(DB::select($query));
    }

    function show($orcamento, $id) {
        return OrcamentoItemResource::collection(orcamento_items::where([['orcamento_dados_id', $orcamento], ['id', $id]])->get());
    }

    function storeInsumo(Request $request, $orcamento) {

        $bdi = new orcamento_items();

        $bdi->orcamento_dados_id = $orcamento;
        $bdi->sequencia = $request->sequencia;
        $bdi->nivel = $request->nivel;
        $bdi->itemizacao = $request->itemizacao;
        $bdi->insumos_id = $request->insumos_id;
        $bdi->quantidade = $request->quantidade;
        $bdi->orcamento_bdi_id = $request->orcamento_bdi_id;

        $bdi->save();

        return new OrcamentoItemResource($bdi);

    }

    function storeNivel(Request $request, $orcamento) {

        $bdi = new orcamento_items();

        $bdi->orcamento_dados_id = $orcamento;
        $bdi->sequencia = $request->sequencia;
        $bdi->nivel = $request->nivel;
        $bdi->itemizacao = $request->itemizacao;
        $bdi->descricao = $request->descricao;

        $bdi->save();

        return new OrcamentoItemResource($bdi);

    }
    
    function updateInsumo(Request $request, $orcamento, $id) {

        $bdi = orcamento_items::find($id);

        $bdi->orcamento_dados_id = $orcamento;
        $bdi->sequencia = $request->sequencia;
        $bdi->nivel = $request->nivel;
        $bdi->itemizacao = $request->itemizacao;
        $bdi->insumos_id = $request->insumos_id;
        $bdi->quantidade = $request->quantidade;
        $bdi->orcamento_bdi_id = $request->orcamento_bdi_id;

        $bdi->save();

        return new OrcamentoItemResource($bdi);

    }
    
    function updateNivel(Request $request, $orcamento, $id) {

        $bdi = orcamento_items::find($id);

        $bdi->orcamento_dados_id = $orcamento;
        $bdi->sequencia = $request->sequencia;
        $bdi->nivel = $request->nivel;
        $bdi->itemizacao = $request->itemizacao;
        $bdi->descricao = $request->descricao;

        $bdi->save();

        return new OrcamentoItemResource($bdi);

    }

    function destroy($orcamento, $item) {
        
        orcamento_items::destroy($item);
        return response('Item removido com sucesso', 204);

    }
}
