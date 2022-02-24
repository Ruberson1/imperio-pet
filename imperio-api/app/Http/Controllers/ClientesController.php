<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Pets;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClientesController extends BaseController
{
    private $clientes;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Clientes $clientes)
    {
        $this->clientes = $clientes;
    }

    public function index()
    {
        
        return response()->json([
            'success' => true,
            'data' => Clientes::all()

        ], 200);
    }

    public function show($id) {
        $model = Clientes::find($id);
        $pets = Pets::where('clientes_id',$id)->get();
        
        if(is_null($model)) {
            return response()->json([
                'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }


        return response()->json([

            'success' => true,
            'data' => $model,$pets
        ], 200);
    }

    public function store(Request $request) {

        $request_data = $request->all();
        $model = Clientes::create($request_data);

        return response()->json([
            'success' => true,
            'data' => $request_data, 
            'message'=> 'Cliente criado com sucesso'
        ], 201);


    }

    public function update(Request $request, $id) {

        $request_data = $request->all();
        $model = Clientes::find($id);

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
            'message' => 'Cliente atualizado com sucesso'
        ], 200);
    }


    public function destroy($id) {

        $model = Clientes::find($id);

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
