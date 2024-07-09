<?php


namespace App\Http\Controllers;

use App\Models\PostoGrad;
use Illuminate\Http\Request;

class PostoGradController extends Controller
{
    public function index()
    {
        return PostoGrad::orderBy('hierarquia', 'ASC')->get();

    }


    public function store(Request $request)
    {
        return PostoGrad::create([
            'posto_grad' => $request['posto_grad'],
            'hierarquia' => $request['hierarquia'],
        ]);

    }

    public function update(Request $request, $id)
    {

        $postograd = PostoGrad::find($id);
        $postograd->posto_grad = $request['posto_grad'];
        $postograd->hierarquia = $request['hierarquia'];
        $postograd->save();

        return $postograd;

    }

    public function destroy($id)
    {

        $postograd = PostoGrad::find($id);

        if (is_null($postograd)) {
            return response()->json([
                'erro' => 'PG não encontrado'
            ], 404);
        }

        // Exclui o quiz
        $postograd->delete();

        return response()->json([
            'mensagem' => 'PG excluído com sucesso'
        ], 200);

    }


}
