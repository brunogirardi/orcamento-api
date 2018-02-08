<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orcamento;
use App\Http\Resources\Orcamento as OrcamentoResource;

class OrcamentoController extends Controller
{
    
    function index() {
        
        return OrcamentoResource::collection(Orcamento::all());

    }

    function show($id) {
        
        return new OrcamentoResource(Orcamento::where('id', $id)->with('bdi')->first());

    }

    function store(Request $request) {

        $orcamento = new Orcamento();

        $orcamento->descricao = $request->descricao;
        $orcamento->endereco = $request->endereco;
        $orcamento->cliente = $request->cliente;
        $orcamento->contrato = $request->contrato;
        $orcamento->data_base = $request->data_base;
        $orcamento->ls_hora = $request->ls_hora;
        $orcamento->ls_mes = $request->ls_mes;

        $orcamento->save();

        return new OrcamentoResource($orcamento);

    }

    function update(Request $request, $id) {

        $orcamento = Orcamento::find($id);

        $orcamento->descricao = $request->descricao;
        $orcamento->endereco = $request->endereco;
        $orcamento->cliente = $request->cliente;
        $orcamento->contrato = $request->contrato;
        $orcamento->data_base = $request->data_base;
        $orcamento->ls_hora = $request->ls_hora;
        $orcamento->ls_mes = $request->ls_mes;

        $orcamento->save();

        return new OrcamentoResource($orcamento);

    }

    function destroy($id) {

        Orcamento::destroy($id);
        return response(null, 204);

    }

}
