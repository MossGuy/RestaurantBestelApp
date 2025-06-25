<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bestelling extends Model
{
    use HasFactory;

    protected $primaryKey = 'bestelling_id';
    public $incrementing = true;

    protected $fillable = [
        'sessie_id',
        'gerecht_id',
    ];

    public function sessie()
    {
        return $this->belongsTo(Sessie::class, 'sessie_id');
    }

    public function gerecht()
    {
        return $this->belongsTo(Gerecht::class, 'gerecht_id');
    }
}
