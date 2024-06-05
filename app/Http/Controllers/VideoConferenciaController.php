<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VideoConferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoConferenciaController extends Controller
{
    public function index()
    {
        return VideoConferencia::orderBy('data', 'ASC')->get()->load('users', 'responsavel');

    }

    public function store(Request $request)
    {
        if ($request['missao'] !== ''
            && $request['data'] !== ''
            && $request['hora'] !== ''
            && $request['data_teste'] !== ''
            && $request['hora_teste'] !== ''
            && $request['solicitante'] !== ''
            && $request['link'] !== ''
            && $request['local'] !== ''
            && $request['plataforma'] !== ''
        ) {

            if ($request['responsavel_id'] === '' || $request['responsavel_id'] === 'null' || $request['responsavel_id'] === null) {
                $responsavel = null;
            } else {
                $responsavel = $request['responsavel_id'];
            }

            if ($responsavel === null) {
                $status = 'Cadastrado';
            } else {
                $status = 'Distribuído';
            }

            $vc = VideoConferencia::create([
                'missao'=>$request['missao'],
                'data'=>$request['data'],
                'hora'=>$request['hora'],
                'data_teste'=>$request['data_teste'],
                'hora_teste'=>$request['hora_teste'],
                'solicitante'=>$request['solicitante'],
                'link'=>$request['link'],
                'status'=>$status,
                'plataforma'=>$request['plataforma'],
                'local'=>$request['local'],
                'obs'=>$request['obs'],
                'responsavel_id'=>$responsavel,
                'user_id'=> Auth::user()->id
            ]);

            return $vc->load('users', 'responsavel');
        } else {
            return 'error';
        }
    }

    public function update(Request $request, $id)
    {

        $vc = VideoConferencia::find($id);
        if ($request['missao'] !== ''
            && $request['data'] !== ''
            && $request['hora'] !== ''
            && $request['data_teste'] !== ''
            && $request['hora_teste'] !== ''
            && $request['solicitante'] !== ''
            && $request['link'] !== ''
            && $request['plataforma'] !== ''
            && $request['local'] !== ''
        ) {

            if ($request['responsavel_id'] === '' || $request['responsavel_id'] === 'null' || $request['responsavel_id'] === null) {
                $responsavel = null;
            } else {
                $responsavel = $request['responsavel_id'];
            }

            if ($responsavel === null && $request['status']) {
                $status = 'Cadastrado';
            } else {
                if ($request['status'] === 'Cadastrado') {

                    $status = 'Distribuído';
                } else {
                    $status = $request['status'];
                }
            }

            $vc->missao = $request['missao'];
            $vc->data = $request['data'];
            $vc->hora = $request['hora'];
            $vc->data_teste = $request['data_teste'];
            $vc->hora_teste = $request['hora_teste'];
            $vc->solicitante = $request['solicitante'];
            $vc->link = $request['link'];
            $vc->status = $status;
            $vc->plataforma = $request['plataforma'];
            $vc->local = $request['local'];
            $vc->obs = $request['obs'];
            $vc->responsavel_id = $responsavel;
            $vc->user_id =  Auth::user()->id;
            $vc->save();


            return $vc->load('users', 'responsavel');
        } else {
            return 'error';
        }


    }

    public function destroy($id)
    {

        $vc = VideoConferencia::find($id);

        if (is_null($vc)) {
            return response()->json([
                'erro' => 'VideoConferência não encontrada'
            ], 404);
        }

        // Exclui o quiz
        $vc->delete();

        return response()->json([
            'mensagem' => 'VideoConferência excluída com sucesso'
        ], 200);

    }

    public function mostraPainel()
    {
        return VideoConferencia::whereIn('status', ['Cadastrado', 'Distribuído', 'Adiado', 'Antecipado'] )->orderBy('data', 'ASC')->get()->load('users', 'responsavel');
    }
}
