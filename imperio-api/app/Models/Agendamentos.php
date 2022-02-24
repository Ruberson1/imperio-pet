<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{

    public $timestamps = false;

    protected $table = 'agendamentos';


    protected $fillable = [
        'id',
        'servicostipo_nome',
        'clientes_nome',
        'quantidade',
        'obs',
        'data',
        'hora',
        'status_tipo'
        
    ];

    protected $appends = ['data'];
    public function getDataAttribute()
    {
        return date('d-m-Y', strtotime($this->attributes['data']));
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'clientes_nome', 'nome');
    }

    public function servicos_tipo()
    {
        return $this->belongsTo(ServicosTipo::class, 'servicostipo_nome', 'nome');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_tipo', 'tipo');
    }
}