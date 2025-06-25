<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Werknemerscode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code' // Voeg deze kolom toe in je migratie
    ];

    // Eventueel: als je extra beveiliging wilt (zoals code hashing), kun je dat hier instellen
}
