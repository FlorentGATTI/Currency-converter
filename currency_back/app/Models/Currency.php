<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    /**
     * Récupère les conversions où cette devise est utilisée comme devise source.
     */
    public function conversionsAsSource()
    {
        return $this->hasMany(Conversions::class, 'currency_from', 'id');
    }

    /**
     * Récupère les conversions où cette devise est utilisée comme devise cible.
     */
    public function conversionsAsTarget()
    {
        return $this->hasMany(Conversions::class, 'currency_to', 'id');
    }

    /**
     * Récupère les paires de conversion auxquelles cette devise appartient en tant que devise source.
     */
    public function pairsAsSource()
    {
        return $this->hasMany(Pair::class, 'currency_from');
    }

    /**
     * Récupère les paires de conversion auxquelles cette devise appartient en tant que devise cible.
     */
    public function pairsAsTarget()
    {
        return $this->hasMany(Pair::class, 'currency_to');
    }
}
