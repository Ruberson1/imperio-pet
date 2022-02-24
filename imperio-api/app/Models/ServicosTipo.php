<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicosTipo extends Model
{

    public $timestamps = false;

    protected $table = 'servicostipo';


    protected $fillable = [
        'id',
        'nome'
        
    ];

    public function tipos()
    {
        return $this->hasOne(Agendamentos::class, 'agendamentos_id', 'id');
    }    
}