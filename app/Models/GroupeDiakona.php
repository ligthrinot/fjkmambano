<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupeDiakona extends Model
{
    protected $fillable = [
        'anarana',
        'fanamariana',
    ];

    public function diakonas()
{
    return $this->hasMany(Diakona::class);
}
}