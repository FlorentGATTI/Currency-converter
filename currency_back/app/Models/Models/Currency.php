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
        return $this->hasMany(Conversion::class, 'currency_from', 'id');
    }

    /**
     * Récupère les conversions où cette devise est utilisée comme devise cible.
     */
    public function conversionsAsTarget()
    {
        return $this->hasMany(Conversion::class, 'currency_to', 'id');
    }

    /**
     * Récupère les paires de conversion auxquelles cette devise appartient.
     */
    public function pairs()
    {
        return $this->belongsToMany(Pair::class, 'conversions', 'currency_from', 'currency_to');
    }
}
