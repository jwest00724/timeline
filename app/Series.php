<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seriesAbbreviation', 'seriesName',
    ];
}
