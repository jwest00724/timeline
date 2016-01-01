<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RelationshipController extends Controller
{
    public function editForm() {
		
		$eventNames = array();
		$mediaNames = array();
		$eventToMedia = array();
		$mediaToEvents = array();
		
		$eventNames = \App\Event::get()->pluck('name', 'id')->toArray();
		$mediaNames = \App\Media::get()->pluck('name', 'id')->toArray();
		
		$eventIDs = \App\Event::get()->pluck('id')->toArray();
		foreach($eventIDs as $eventID) {
			$eventToMedia[$eventID] = \App\Media::join('event_media', 'media.id', '=', 'event_media.mediaID')->where('event_media.eventID', $eventID)->get()->pluck('name', 'id')->toArray();
		}
		
		$mediaIDs = \App\Media::get()->pluck('id')->toArray();
		foreach($mediaIDs as $mediaID) {
			$mediaToEvents[$mediaID] = \App\Event::join('event_media', 'events.id', '=', 'event_media.eventID')->where('event_media.mediaID', $mediaID)->get()->pluck('name', 'id')->toArray();
		}
		
		return view('forms/editRelationships')->with(['eventNames'=>$eventNames, 'mediaNames'=>$mediaNames, 'eventToMedia'=>$eventToMedia, 'mediaToEvents'=>$mediaToEvents]);
	}
	
	public function delete($eventID, $mediaID) {
		return redirect('/editRelationships');
	}
	
	public function newMedia($eventID) {
		return redirect('/editRelationships');
	}
	
	public function newEvent($mediaID) {
		return redirect('/editRelationships');
	}
}
