<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kategoria;

class Ingatlan extends Model
{
    protected $table = 'ingatlanok';

    protected $fillable = [
        'kategoria_id',
        'leiras',
        'datum',
        'tehermentes',
        'ar',
        'kepUrl',
    ];

    public function kategoria(): BelongsTo
    {
        return $this->belongsTo(Kategoria::class, 'kategoria_id');
    }
}
