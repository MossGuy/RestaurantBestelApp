<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TafelSessie extends Model
{
    use HasFactory;

    protected $primaryKey = 'sessie_id';
    public $incrementing = true;

    protected $fillable = [
        'tafel_nummer',
        'datum',
        'sessie_afgerond',
    ];

    protected $casts = [
        'sessie_afgerond' => 'boolean',
        'datum' => 'datetime',
    ];

    public function bestellingen()
    {
        return $this->hasMany(Bestelling::class, 'sessie_id');
    }
}
