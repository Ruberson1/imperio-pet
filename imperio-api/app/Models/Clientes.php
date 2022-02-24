<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clientes extends Model
{
    public $timestamps = false;

    protected $table = 'clientes';


    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'telefone'
        
    ];
    
    public function pets()
    {
        return $this->hasOne(Pets::class, 'clientes_nome', 'nome');
    }
    
    public function clientes()
    {
        return $this->hasOne(Agendamentos::class, 'agendamentos_id', 'id');
    }
}
