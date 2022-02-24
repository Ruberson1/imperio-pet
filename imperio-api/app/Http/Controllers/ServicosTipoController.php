<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicosTipo;
use Laravel\Lumen\Routing\Controller as BaseController;

class ServicosTipoController extends BaseController
{
    private $servicostipo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ServicosTipo $servicostipo)
    
    {
        $this->servicostipos = $servicostipo;
    }

    public function index()
    {
        
        return ServicosTipo::all();
        //return $this->Pets->paginate(10);
    }
}    