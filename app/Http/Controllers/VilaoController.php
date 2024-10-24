<?php

namespace App\Http\Controllers;

use App\Models\Vilao;
use App\Responses\jsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VilaoController extends Controller
{
    public function criar(Request $request) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'pontosPoder'=> 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $vilao = Vilao::create($request->all());
        return JsonResponse::success('Vilão criado com sucesso', $vilao);

    }


    public function editar(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'pontosPoder'=> 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $vilao = Vilao::findOrFail($id);
        $vilao->update($request->all());

        return JsonResponse::success('Vilão atualizado com sucesso', $vilao);
    }

    public function excluir(Request $request, $id) {
        $vilao = Vilao::findOrFail($id);
        $vilao->delete();
        
        return JsonResponse::success('Vilão deletado com sucesso',);
    }

    public function listar() {
        $viloes = Vilao::all();

        return jsonResponse::success(data: $viloes);
    }

    public function exibirPeloId(Request $request, $id) {
        $vilao = Vilao::findOrFail($id);

        return jsonResponse::success('Vilão encontrado',$vilao);
    }
}
