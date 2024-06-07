<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\User;
use App\Models\UserPerfilBasico;
use App\Models\UserPerfilS;
use App\Models\UserPerfilSBD;
use App\Models\UserPerfilSBL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    //lista os usuários
    public function index()
    {
        return User::all()->load('postograd', 'endereco', 'telefones', 'secoes');
    }

    // retorna se o usuário pode ou não usar o cpf ao se cadastrar / editar
    public function emailExist(Request $request)
    {
        $id_usuario = $request['id'];
        if ($id_usuario === null) {
            $teste = User::where('email', $request['email'])->count();
        } else {
            $teste = User::where('email', $request['email'])->where('id', '!=', $id_usuario)->count();
        }
        return $teste;
    }

    public function cpfExist(Request $request)
    {
        $id_usuario = $request['id'];
        if ($id_usuario === null) {
            $teste = User::where('cpf', $request['cpf'])->count();
        } else {
            $teste = User::where('cpf', $request['cpf'])->where('id', '!=', $id_usuario)->count();
        }
        return $teste;
    }

    //limpa os . e - de um cpf para resetar senha
    function limpaCPF_CNPJ($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }

    // altera a senha de um usuário resetado
    public function alteraSenhaResetada(Request $request)
    {
        $user = User::find($request['id']);
        $user->password = Hash::make($request['password']);
        $user->reset = 0;
        $user->save();
    }

    // altera a senha de um usuário normal
    public function alteraSenhaNormal(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request['password']);
        $user->save();
    }

    // cria um novo usuário
    public function createUser(Request $request)
    {
        if ($request['tipoCadastro'] === 'Simplificado') {
            $usuario = User::create([
                'cpf' => $request['cpf'],
                'password' => Hash::make($request['cpf']),
                'reset' => 1,
            ]);

            // Atualizar as secoes
            $usuario->secoes()->sync($request['secoes']);

            return $usuario->load('postograd', 'endereco', 'telefones', 'secoes');

        } else {

            $usuario = User::create([
                'cpf' => $request['cpf'],
                'data_nasc' => $request['data_nasc'],
                'data_praca' => $request['data_praca'],
                'data_pronto_om' => $request['data_pronto_om'],
                'email' => $request['email'],
                'idt' => $request['idt'],
                'nome_completo' => $request['nome_completo'],
                'nome_guerra' => $request['nome_guerra'],
                'posto_grad_id' => $request['posto_grad_id'],
                'sexo' => $request['sexo'],
                'password' => Hash::make($request['cpf']),
                'reset' => 1,
            ]);

            $usuario->secoes()->sync($request['secoes']);

            foreach ($request['telefones'] as $telctt) {
                if ($telctt['numero'] !== '' && $telctt['numero'] !== null && $telctt['numero'] !== 'null') {
                    Telefone::create([
                        'numero' => $telctt['numero'],
                        'funcional' => $telctt['funcional'],
                        'user_id' => $usuario->id
                    ]);
                }
            }

            Endereco::create([
                'rua' => $request['endereco']['rua'],
                'numero' => $request['endereco']['numero'],
                'complemento' => $request['endereco']['complemento'],
                'bairro' => $request['endereco']['bairro'],
                'cidade' => $request['endereco']['cidade'],
                'estado' => $request['endereco']['estado'],
                'cep' => $request['endereco']['cep'],
                'user_id' => $usuario->id,
            ]);

            return $usuario->load('postograd', 'endereco', 'telefones', 'secoes');


        }
    }

    // altera um usuário
    public function update(int $id, Request $request)
    {

        $usuario = User::find($id)->load('postograd', 'endereco', 'telefones', 'secoes');

        if (is_null($usuario)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);

        }

        $usuario->cpf = $request['cpf'];
        $usuario->idt = $request['idt'];
        $usuario->nome_completo = $request['nome_completo'];
        $usuario->sexo = $request['sexo'];
        $usuario->nome_guerra = $request['nome_guerra'];
        $usuario->posto_grad_id = $request['posto_grad_id'];
        $usuario->data_nasc = $request['data_nasc'];
        $usuario->data_praca = $request['data_praca'];
        $usuario->data_pronto_om = $request['data_pronto_om'];
        $usuario->email = $request['email'];
        $usuario->save();


        $usuario->secoes()->sync($request['secoes']);

        $telefoneIds = $usuario->telefones->pluck('id')->toArray();
        Telefone::destroy($telefoneIds);

        foreach ($request['telefones'] as $telctt) {
            if ($telctt['numero'] !== '' && $telctt['numero'] !== null && $telctt['numero'] !== 'null') {
                Telefone::create([
                    'numero' => $telctt['numero'],
                    'funcional' => $telctt['funcional'],
                    'user_id' => $usuario->id
                ]);
            }
        }

        // Atualizar ou criar endereço
        if ($usuario->endereco) {
            $endereco = $usuario->endereco;
        } else {
            $endereco = new Endereco();
            $endereco->user_id = $usuario->id; // Defina a relação com o usuário
        }

        $endereco->rua = $request->input('endereco.rua');
        $endereco->numero = $request->input('endereco.numero');
        $endereco->complemento = $request->input('endereco.complemento');
        $endereco->bairro = $request->input('endereco.bairro');
        $endereco->cidade = $request->input('endereco.cidade');
        $endereco->estado = $request->input('endereco.estado');
        $endereco->cep = $request->input('endereco.cep');
        $endereco->save();



        return $usuario;

    }

    // remove um usuário
    public function destroy($id)
    {

        $usuario = User::destroy($id);

        if ($usuario === 0) {

            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);

        } else {
            return response()->json('', 204);
        }

    }

    // reseta a senha de um usuário
    public function resetaSenha(Request $request)
    {
        $user = User::find($request['id']);
        $user->password = Hash::make($this->limpaCPF_CNPJ($user->cpf));
        $user->reset = 1;
        $user->save();

        return $user->load('postograd', 'endereco', 'telefones', 'secoes');
    }

}
