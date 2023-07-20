<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversions extends Model
{
    use HasFactory;

    protected $fillable = ['pair_id', 'count'];

    /**
     * Récupère la paire de devises associée à cette conversion.
     */
    public function pair()
    {
        return $this->belongsTo(Pair::class, 'pair_id');
    }

    /**
     * Récupère la devise source de cette conversion.
     */
    public function sourceCurrency()
    {
        return $this->belongsTo(Currency::class, 'currency_from', 'id');
    }

    /**
     * Récupère la devise cible de cette conversion.
     */
    public function targetCurrency()
    {
        return $this->belongsTo(Currency::class, 'currency_to', 'id');
    }
}
