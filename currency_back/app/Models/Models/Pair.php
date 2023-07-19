<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Récupère les conversions associées à cette paire de devises.
     */
    public function conversions()
    {
        return $this->hasMany(Conversion::class);
    }

    /**
     * Récupère la devise source de cette paire de devises.
     */
    public function sourceCurrency()
    {
        return $this->belongsTo(Currency::class, 'currency_from', 'id');
    }

    /**
     * Récupère la devise cible de cette paire de devises.
     */
    public function targetCurrency()
    {
        return $this->belongsTo(Currency::class, 'currency_to', 'id');
    }
}
