<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diakona extends Model
{
    protected $fillable = [
        'kristianina_id',
        'groupe_diakona_id',
        'karazana',
        'daty_fidiana',
        'daty_manomboka',
        'daty_farany',
        'active',
        'fanamariana',
    ];

    protected $casts = [
        'daty_fidiana'    => 'date',
        'daty_manomboka'  => 'date',
        'daty_farany'     => 'date',
        'active'          => 'boolean',
    ];

    public function kristianina()
    {
        return $this->belongsTo(Kristianina::class);
    }

    public function groupeDiakona()
    {
        return $this->belongsTo(GroupeDiakona::class);
    }

    // Mandat en cours
    public function scopeActif($query)
    {
        return $query->where('active', true);
    }

    // Historique terminé
    public function scopeTermine($query)
    {
        return $query->where('active', false);
    }
}