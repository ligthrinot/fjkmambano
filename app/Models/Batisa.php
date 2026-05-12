<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batisa extends Model
{
    protected $fillable = [
        'kristianina_id',
        'daty',
        'mpanao_batisa',
        'fanamarinana',
    ];

    protected $casts = [
        'daty' => 'date',
    ];

    public function kristianina()
    {
        return $this->belongsTo(Kristianina::class);
    }
}