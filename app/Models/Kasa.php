<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasa extends Model
{
    use HasFactory;

    protected $table = 'kasa';
    protected $fillable = [
        'opis',
        'iznos',
        'datum',
        'status',
    ];

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }
}
