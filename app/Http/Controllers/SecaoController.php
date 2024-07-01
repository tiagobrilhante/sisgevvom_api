<?php


namespace App\Http\Controllers;

use App\Models\Secao;
use Illuminate\Http\Request;

class SecaoController extends Controller
{
    public function index()
    {
        return Secao::all();

    }

    public function secoesFuncoes()
    {
        return Secao::all()->load('funcoes.permissoes');
    }

    public function secoesFuncoesOm($id)
    {
        return Secao::where('om_id', $id)->get()->load('funcoes.permissoes');
    }

    public function porOm($id)
    {
        return Secao::where('om_id', $id)->get()->load('funcoes');
    }

    public function store(Request $request)
    {
        if (!$request['esecaopai']) {
            if ($request['nome'] !== '' && $request['sigla'] !== '' && $request['secao_pai'] !== '' && $request['om_id'] !== '') {
                return Secao::create([
                    'nome' => $request['nome'],
                    'sigla' => $request['sigla'],
                    'secao_pai' => $request['secao_pai'],
                    'om_id' => $request['om_id']
                ]);
            } else {
                return 'error';
            }
        } else {
            $secao = Secao::create([
                'nome' => $request['nome'],
                'sigla' => $request['sigla'],
                'om_id' => $request['om_id']
            ]);

            $minhaSecao = Secao::find($secao->id);
            $minhaSecao->secao_pai = $secao->id;
            $minhaSecao->save();
            return $minhaSecao;
        }

    }

    public function update(Request $request, $id)
    {

        $secao = Secao::find($id);
        if ($request['nome'] !== '' && $request['sigla'] !== '') {
            if ($request['esecaopai']) {
                $secao->secao_pai = $secao->id;
            } else {
                $secao->secao_pai = $request['secao_pai'];
            }
            $secao->nome = $request['nome'];
            $secao->sigla = $request['sigla'];
            $secao->om_id = $request['om_id'];
            $secao->save();
            return $secao;
        } else {
            return 'error';
        }
    }

    public function destroy($id)
    {

        $secao = Secao::find($id);

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
