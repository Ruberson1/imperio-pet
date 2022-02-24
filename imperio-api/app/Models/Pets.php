<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pets extends Model
{
    public $timestamps = false;

    protected $table = 'pets';


    protected $fillable = [
        'id',
        'nome',
        'clientes_nome',
        'raca',
        'porte'
        
    ];
    
    public function clientes()
    {
        return $this->belongsTo(Clientes::class, 'clientes_id', 'id');
    }
}