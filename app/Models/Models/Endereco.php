<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
class Endereco extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'endereco';
    protected $fillable = ['perfil_id', 'nome','estado'];

    public function perfils()
    {
        return $this->hasOne(Perfil::class, 'id', 'perfil_id');
    }
}
