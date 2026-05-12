<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kristianina extends Model
{
    protected $fillable = [
        'anarana',
        'fanampiny',
        'daty_nahaterahana',
        'daty_nidirana',
        'fiangonana_niaviana',
        'batisa',
        'batisa_daty',
        'batisa_toerana',
        'mpandray',
        'mpandray_daty',
        'mpandray_toerana',
        'fianakaviana_id',
        'andraikitra',
        'laharana',
        'fanamarinana',
    ];

    protected $casts = [
        'batisa'             => 'boolean',
        'mpandray'           => 'boolean',
        'daty_nahaterahana'  => 'date',
        'daty_nidirana'      => 'date',
        'batisa_daty'        => 'date',
        'mpandray_daty'      => 'date',
    ];

    public function fianakaviana()
    {
        return $this->belongsTo(Fianakaviana::class);
    }

    public function diakonas()
    {
        return $this->hasMany(Diakona::class);
    }

    public function diakonaActif()
    {
        return $this->hasOne(Diakona::class)->where('active', true);
    }
    public function batisaRecord()
    {
        return $this->hasOne(Batisa::class);
    }
    public function fandraisanaRecord()
    {
        return $this->hasOne(Fandraisana::class);
    }
}