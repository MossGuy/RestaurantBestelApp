<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gerecht extends Model
{
    use HasFactory;

    protected $table = 'gerechten';
    protected $primaryKey = 'gerecht_id'; // Aangepaste primaire sleutel
    public $incrementing = true;

    protected $fillable = [
        'naam',
        'category',
        'sybcategory',
        'prijs',
        'leeftijdsgebonden',
        'beschrijving',
    ];

    protected $casts = [
        'leeftijdsgebonden' => 'boolean',
        'prijs' => 'decimal:2',
    ];

    // Relatie met bestellingen (many-to-many via pivot)
    public function bestellingen()
    {
        return $this->belongsToMany(Bestelling::class, 'bestellingen', 'gerecht_id', 'bestelling_id');
    }
}
