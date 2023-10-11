<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'codigo', 'preco_compra', 'preco_venda', 'quantidade_estoque', 'categoria_id', 'imagem'];

}
