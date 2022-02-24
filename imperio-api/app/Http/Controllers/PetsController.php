<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pets;
use Laravel\Lumen\Routing\Controller as BaseController;

class PetsController extends BaseController
{
    private $pets;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Pets $pets)
    {
        $this->pets = $pets;
    }

    public function index()
    {
        
        return Pets::all();
        //return $this->Pets->paginate(10);
    }

    public function show($id) {
        $model = Pets::find($id);
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
        $model = Pets::create($request_data);

        return response()->json([
            'success' => true,
            'data' => $request_data, 
            'message'=> 'Pet criado com sucesso'
        ], 201);


    }

    public function update(Request $request, $id) {

        $request_data = $request->all();
        $model = Pets::find($id);

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
            'message' => 'Pet atualizado com sucesso'
        ], 200);
    }


    public function destroy($id) {

        $model = Pets::find($id);

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
