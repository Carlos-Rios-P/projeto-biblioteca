<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    public const DISPONIVEL = 1;
    public const EMPRESTADO    = 0;

    public const STATUS_LIVRO = [
        self::DISPONIVEL    => 'Disponível',
        self::EMPRESTADO    => 'Emprestado'
    ];

    public const FICCAO     = 'Ficção';
    public const ROMANCE    = 'Romance';
    public const FANTASIA   = 'Fantasia';
    public const AVENTURA   = 'Aventura';
    public const ACAO       = 'Ação';

    public const GENERO_LIVRO = [
        self::FICCAO,
        self::ROMANCE,
        self::FANTASIA,
        self::AVENTURA,
        self::ACAO
    ];

    protected $fillable = [
        'nome',
        'autor',
        'genero',
        'situacao',
        'numero_registro'
    ];
}
