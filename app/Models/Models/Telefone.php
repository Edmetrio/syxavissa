<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Telefone extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'telefone';
    protected $fillable = ['perfil_id','operadora_id','numero','estado'];

    public function operadoras()
    {
        return $this->hasOne(Operadora::class, 'id', 'operadora_id');
    }

    public function perfils()
    {
        return $this->hasOne(Perfil::class, 'id', 'perfil_id');
    }
}
