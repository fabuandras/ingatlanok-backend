<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Ingatlan;

class Kategoria extends Model
{
    protected $table = 'kategoriak';

    protected $fillable = [
        'kategoria_nev',
    ];

    public function ingatlanok(): HasMany
    {
        return $this->hasMany(Ingatlan::class, 'kategoria_id');
    }
}
