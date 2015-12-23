<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eventID', 'itemID',
    ];
}
