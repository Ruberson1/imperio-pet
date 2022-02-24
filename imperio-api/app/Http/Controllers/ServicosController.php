<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;
use Laravel\Lumen\Routing\Controller as BaseController;

class ServicosController extends BaseController
{
    private $servicos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Servicos $servicos)
    {
        $this->servicos = $servicos;
    }

    public function index()
    {
        return response()->json([
            //'success' => true,
            'data' => Servicos::with('cliente','servicos_tipo')->get()

        ], 200);
    }

    public function show($id) {
        $model = Servico::find($id);
        if(is_null($model)) {
            return response()->json([
                //'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }


        return response()->json([
            'success' => true,
            'data' => $model
        ], 200);
    }

    public function store(Request $request) {

        $request_data = $request->all();
        $model = Servicos::create($request_data);

        return response()->json([
            'success' => true,
            'data' => $request_data, 
            'message'=> 'serviço criado com sucesso'
        ], 201);


    }

    public function update(Request $request, $id) {

        $request_data = $request->all();
        $model = Servicos::find($id);

        if(is_null($model)) {
            return response()->json([
                'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }

        $model->update($request_data);

        return response()->json([
            'success' => true,
            'data' => $model,
            'message' => 'serviço atualizado com sucesso'
        ], 200);
    }


    public function destroy($id) {

        $model = Servicos::find($id);

        if(is_null($model)) {
            return response()->json([
                'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }

        $model->delete();

        return response()->json([
            'success' => true,
            'message ' => 'Deletado!'
        ], 200);
    }
}
