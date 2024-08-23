<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'cnpj'];

    public  function servicos()
    {
        return $this->hasmany(Servico::class);
    }
}
