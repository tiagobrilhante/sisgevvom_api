<?php


namespace App\Http\Controllers;

use App\Models\Om;
use Illuminate\Http\Request;


class OmController extends Controller
{
    public function index()
    {
        return Om::all();
    }

    public function store(Request $request)
    {
        if (!$request['eompai']) {
            if ($request['nome'] !== '' && $request['sigla'] !== '' && $request['om_pai'] !== '') {
                $om = Om::create([
                    'nome' => $request['nome'],
                    'sigla' => $request['sigla'],
                    'om_pai' => $request['om_pai'],
                ]);

                return $om;
            } else {
                return 'error';
            }
        } else {
            $om = Om::create([
                'nome' => $request['nome'],
                'sigla' => $request['sigla'],
            ]);

            $minhaOm = Om::find($om->id);
            $minhaOm->om_pai = $om->id;
            $minhaOm->save();
            return $minhaOm;
        }


    }

    public function update(Request $request, $id)
    {

        $om = Om::find($id);
        if ($request['nome'] !== '' && $request['sigla'] !== '' && $request['om_pai'] !== '') {
            $om->nome = $request['nome'];
            $om->sigla =$request['sigla'];


            if ($request['eompai']) {
                $om->om_pai = $om->id;
            } else {
                $om->om_pai =$request['om_pai'];
            }
            $om->save();
            return $om;

        } else {
            return 'error';
        }


    }

    public function destroy($id)
    {

        $om = Om::find($id);

        if (is_null($om)) {
            return response()->json([
                'erro' => 'Om não encontrada'
            ], 404);
        }

        // Exclui o quiz
        $om->delete();

        return response()->json([
            'mensagem' => 'Om excluída com sucesso'
        ], 200);

    }

    public function getChart($id)
    {
        $om = Om::find($id);


        $meus_filhos = Om::where('om_pai', $om->id)->where('id', '!=', $om->id)->get();

        $objectReturn = (object)[
            'id' => $om->id,
            'title' => $om->nome,
            'name' => $om->sigla,
            'children' => $this->retornaFilhos($meus_filhos)
        ];


        return response()
            ->json($objectReturn, 201);


    }

    private function retornaFilhos($filhos)
    {

        $arrayDeFilhos = [];

        foreach ($filhos as $filho) {

            $lefilhos = $filho->where('om_pai', $filho->id)->get();

            $arrayDeFilhos[] = (object)[
                'id' => $filho->id,
                'title' => $filho->nome,
                'name' => $filho->sigla,
                'children' => $this->retornaFilhos($lefilhos)
            ];
        }

        return $arrayDeFilhos;

    }

    public function getPais()
    {
        $leoms = Om::all();

        $array_pais = [];

        foreach ($leoms as $om) {
            if ($om->id === $om->om_pai) {
                array_push($array_pais, $om);
            }
        }

        return $array_pais;

    }


}
