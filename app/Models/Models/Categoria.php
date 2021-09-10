<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Categoria extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'categoria';
    protected $fillable = ['nome','icon','estado'];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class, 'categoria_id');
    }

    public function artigos()
    {
        return $this->hasMany(Artigo::class, 'categoria_id');
    }
}
