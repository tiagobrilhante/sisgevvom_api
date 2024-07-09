<?php


namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{

    public function gerarToken(Request $request)
    {

        // valida os dados
        $this->validate($request, [
            'cpf' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('cpf', $request['cpf'])->first()->load('secoes', 'postograd', 'om', 'funcoes.permissoes');

        // Ocultando atributos no modelo principal
        $user->makeHidden([
            'created_at', 'updated_at', 'deleted_at', 'posto_grad_id', 'data_pronto_om',
            'data_praca', 'sexo', 'idt', 'nome_completo', 'nome_guerra', 'email'
        ]);
        // Ocultando atributos nas relações
        if ($user->secoes) {
            $user->secoes->makeHidden(['created_at', 'updated_at','deleted_at', 'pivot']);
        }

        if ($user->postograd) {
            $user->postograd->makeHidden(['id','created_at',  'updated_at','deleted_at']);
        }


        // caso senha errada
        if (is_null($user) || !Hash::check($request->password, $user->password)) {

            return response()->json('Usuário ou senha inválidos', 401);

        }

        // payload
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'cpf' => $user->cpf, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            //'exp' => time() + 60 * 60 * 60 * 24 // Expiration time
            'exp' => time() + 43200 // Expiration time (12 horas)
        ];

        $token = JWT::encode($payload, env('JWT_KEY'));

        return [
            'access_token' => $token,
            'user' => $user
        ];

    }

}
