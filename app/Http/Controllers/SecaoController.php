<?php


namespace App\Http\Controllers;

use App\Models\Secao;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecaoController extends Controller
{
    public function index()
    {
        return Secao::all();

    }

    public function store(Request $request)
    {
        if ($request['nome'] !== '' && $request['sigla'] !== '') {
            return Secao::create($request->all());
        } else {
            return 'error';
        }


    }

    public function update(Request $request, $id)
    {

        $secao = Secao::find($id);
        if ($request['nome'] !== '' && $request['sigla'] !== '') {
            $secao->update($request->all());
            return $secao;
        } else {
            return 'error';
        }


    }

    public function destroy($id)
    {

        $secao= Secao::find($id);

        if (is_null($secao)) {
            return response()->json([
                'erro' => 'Seção não encontrada'
            ], 404);
        }

        // Exclui o quiz
        $secao->delete();

        return response()->json([
            'mensagem' => 'Seção excluída com sucesso'
        ], 200);

    }


}
