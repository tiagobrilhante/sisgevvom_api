<?php


namespace App\Http\Controllers;

use App\Models\Funcao;
use App\Models\Secao;
use Illuminate\Http\Request;


class FuncaoController extends Controller
{
    public function index()
    {
        return Funcao::all()->load('secao','permissoes');

    }

    public function porOm($id)
    {

        $secoes = Secao::where('om_id', $id)->get();

        $arraySecoes = [];
        foreach ($secoes as $secao) {
            $arraySecoes[] = $secao->id;
        }

        return Funcao::whereIn('secao_id', $arraySecoes)->get()->load('secao.om','permissoes');

    }

    public function store(Request $request)
    {
        if ($request['nome'] !== '' && $request['secao_id'] !== '' && count($request['permissoes']) !== 0) {
            // tenho que arrumar
            $funcao = Funcao::create([
                'nome' => $request['nome'],
                'secao_id' => $request['secao_id']
            ]);

            // Adiciona as novas permissões
            foreach ($request->input('permissoes') as $permissao) {
                $funcao->permissoes()->create(['permissao' => $permissao]);
            }

            return $funcao->load('secao','permissoes');
        }

        return response()->json(['error' => 'Invalid input'], 400);

    }

    public function update(Request $request, $id)
    {
        $funcao = Funcao::find($id);

        if ($funcao && $request->input('nome') !== '' && $request->input('secao_id') !== '' && count($request->input('permissoes')) !== 0) {
            // Atualiza a função
            $funcao->update([
                'nome' => $request->input('nome'),
                'secao_id' => $request->input('secao_id')
            ]);

            // Atualiza as permissões
            $funcao->permissoes()->delete(); // Remove todas as permissões atuais

            // Adiciona as novas permissões
            foreach ($request->input('permissoes') as $permissao) {
                $funcao->permissoes()->create(['permissao' => $permissao]);
            }

            return $funcao->load('secao','permissoes');
        } else {
            return response()->json(['error' => 'Invalid input'], 400);
        }
    }

    public function destroy($id)
    {

        $funcao = Funcao::find($id);

        if (is_null($funcao)) {
            return response()->json([
                'erro' => 'Função não encontrada'
            ], 404);
        }

        // Exclui o quiz
        $funcao->delete();

        return response()->json([
            'mensagem' => 'Função excluída com sucesso'
        ], 200);

    }


}
