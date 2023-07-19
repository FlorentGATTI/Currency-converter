<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;

    protected $fillable = ['currency_from', 'currency_to', 'rate'];

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
