<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public $timestamps = false;

    protected $table = 'status';


    protected $fillable = [
        'id',
        'tipo'
        
    ];

    public function tipos()
    {
        return $this->hasOne(Servicos::class, 'servicos_id', 'id');
    }    
}