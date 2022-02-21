<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $fillable = [
        'prezime',
        'ime',
        'ime_roditelja', 
        'datum_rodjenja',
        'start_treniranja',
        'status',
        'telefon',
        'email',
        'broj_clanske_karte'
    ];

    public function kasa()
    {
        return $this->hasOne(Kasa::class);
    }
}
