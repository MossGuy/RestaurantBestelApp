<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bestelling extends Model
{
    use HasFactory;

    protected $table = 'bestellingen';

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'sessie_id',
        'gerecht_id',
        'tafel_nummer',
        'is_klaar'
    ];

    public function sessie()
    {
        return $this->belongsTo(TafelSessie::class, 'sessie_id');
    }

    public function gerecht()
    {
        return $this->belongsTo(Gerecht::class, 'gerecht_id');
    }
}
