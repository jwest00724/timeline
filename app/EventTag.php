<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eventID', 'tag',
    ];
}
