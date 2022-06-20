<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'nome_usuario',
        'nome_livro',
        'data_devolucao',
        'status_transacao'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
