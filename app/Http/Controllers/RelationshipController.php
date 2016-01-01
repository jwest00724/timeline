<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RelationshipController extends Controller
{
    public function editForm() {
		
		$eventToMedia = array();
		$mediaToEvents = array();
		
		$eventIDs = \App\Event::get()->pluck('id')->toArray();
		foreach($eventIDs as $eventID) {
			$eventToMedia[$eventID] = \App\Media::join('event_media', 'media.id', '=', 'event_media.mediaID')->where('event_media.eventID', $eventID)->get()->pluck('name', 'id')->toArray();
		}
		
		$mediaIDs = \App\Media::get()->pluck('id')->toArray();
		foreach($mediaIDs as $mediaID) {
			$mediaToEvents[$mediaID] = \App\Event::join('event_media', 'events.id', '=', 'event_media.eventID')->where('event_media.mediaID', $mediaID)->get()->pluck('name', 'id')->toArray();
		}
		
		return view('forms/editRelationships')->with(['eventToMedia'=>$eventToMedia, 'mediaToEvents'=>$mediaToEvents]);
	}
}
