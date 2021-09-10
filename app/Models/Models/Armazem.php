<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Armazem extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'armazem';
    protected $fillable = ['numero','nome','local','estado'];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'armazem_id');
    }
}
