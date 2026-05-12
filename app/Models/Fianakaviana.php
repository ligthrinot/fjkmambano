<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fianakaviana extends Model
{
    protected $table = 'fianakaviana';

    protected $fillable = [
        'anarana',
        'adressy',
        'faritra',
        'fokontany',
        'fifandraisana',
        'fanamarihana',
    ];
    public function kristianinas()
{
    return $this->hasMany(Kristianina::class);
}
}

