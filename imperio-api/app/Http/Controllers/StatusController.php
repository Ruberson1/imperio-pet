<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Laravel\Lumen\Routing\Controller as BaseController;

class StatusController extends BaseController
{
    private $status;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Status $status)
    
    {
        $this->statuss = $status;
    }

    public function index()
    {
        
        return Status::all();
        //return $this->Pets->paginate(10);
    }
}    