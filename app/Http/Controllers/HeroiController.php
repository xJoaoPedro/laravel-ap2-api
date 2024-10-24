<?php

namespace App\Http\Controllers;

use App\Models\Heroi;
use App\Responses\jsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroiController extends Controller
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

        $heroi = Heroi::create($request->all());
        return JsonResponse::success('Heroi criado com sucesso', $heroi);

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

        $heroi = Heroi::findOrFail($id);
        $heroi->update($request->all());

        return JsonResponse::success('Heroi atualizado com sucesso', $heroi);
    }

    public function excluir(Request $request, $id) {
        $heroi = Heroi::findOrFail($id);
        $heroi->delete();
        
        return JsonResponse::success('Heroi deletado com sucesso',);
    }

    public function listar() {
        $herois = Heroi::all();

        return jsonResponse::success(data: $herois);
    }

    public function exibirPeloId(Request $request, $id) {
        $heroi = heroi::findOrFail($id);

        return jsonResponse::success('Heroi encontrado',$heroi);
    }
}
