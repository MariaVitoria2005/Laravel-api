<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'servico_id', 'data'];

    public  function Cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public  function Servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
