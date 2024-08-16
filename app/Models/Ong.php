<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id_Ong',
        'Nome',
        'CNPJ',
        'Responsavel',
        'Endereco',
        'CEP',
        'Estado',
        'Cidade',
        'Complemento',
        'Telefone',
        'Linkdoacao',
        'Sobre',
        'Email',
        'Senha',
    ];
}
