<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;
use App\Models\Agendamentos;
use Laravel\Lumen\Routing\Controller as BaseController;

class AgendamentosController extends BaseController
{
    private $agendamentos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Agendamentos $agendamentos)
    {
        $this->agendamentos = $agendamentos;
    }

    public function index()
    {
        $agendamentos = Agendamentos::with('cliente','servicos_tipo')->get();
        $servicos = Servicos::where('status_tipo',"Agendado")->get();
        return response()->json([
            

            'success' => true,
            'data' => $agendamentos,$servicos

        ], 200);
    }

    public function show($id) {
        $model = Agendamentos::find($id);
        if(is_null($model)) {
            return response()->json([
                //'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }


        return response()->json([
            //'success' => true,
            'data' => $model
        ], 200);
    }

    public function store(Request $request) {

        $request_data = $request->all();
        $model = Agendamentos::create($request_data);

        return response()->json([
            'success' => true,
            'data' => $request_data, 
            'message'=> 'Agendamento criado com sucesso'
        ], 201);


    }

    public function update(Request $request, $id) {

        $request_data = $request->all();
        $model = Agendamentos::find($id);

        if(is_null($model)) {
            return response()->json([
                'success' => false,
                'message' => 'Agendamento não existe'
            ], 404);
        }

        $model->update($request_data);

        return response()->json([
            'success' => true,
            'data' => $model,
            'message' => 'agendamento atualizado com sucesso'
        ], 200);
    }


    public function destroy($id) {

        $model = Agendamentos::find($id);

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
