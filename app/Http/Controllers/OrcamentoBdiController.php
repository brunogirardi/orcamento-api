<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orcamento_bdi;
use App\Http\Resources\OrcamentoBdi as OrcamentoBdiResource;

class OrcamentoBdiController extends Controller
{
    
    function index($orcamento) {
        return OrcamentoBdiResource::collection(orcamento_bdi::where('orcamento_dados_id', $orcamento)->get());
    }

    function show($orcamento, $id) {
        return OrcamentoBdiResource::collection(orcamento_bdi::where([['orcamento_dados_id', $orcamento], ['id', $id]])->get());
    }

    function store(Request $request, $orcamento) {

        $bdi = new orcamento_bdi();

        $bdi->orcamento_dados_id = $orcamento;
        $bdi->descricao = $request->descricao;
        $bdi->valor = $request->valor;

        $bdi->save();

        return new OrcamentoBdiResource($bdi);

    }
    
    function update(Request $request, $orcamento, $id) {

        $bdi = orcamento_bdi::find($id);

        $bdi->descricao = $request->descricao;
        $bdi->valor = $request->valor;

        $bdi->save();

        return new OrcamentoBdiResource($bdi);

    }

    function destroy($orcamento, $item) {
        
        orcamento_bdi::destroy($item);
        return response('Item removido com sucesso', 204);

    }

}
