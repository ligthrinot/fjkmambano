<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fandraisana extends Model
{
    protected $fillable = [
        'kristianina_id',
        'daty',
        'mpanao',
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