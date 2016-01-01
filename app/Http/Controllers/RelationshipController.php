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
	
	public function newMedia($eventID, Request $request) {
		$existingRelationship = \App\EventMedia::where('eventID', $eventID)->where('mediaID', $request->newItem)->get()->toArray();
		if (empty($existingRelationship)) {
			\App\EventMedia::create(['eventID'=>$eventID, 'mediaID'=>$request->newItem]);
		}
		return redirect('/editRelationships');
	}
	
	public function newEvent($mediaID, Request $request) {
		$existingRelationship = \App\EventMedia::where('mediaID', $mediaID)->where('eventID', $request->newItem)->get()->toArray();
		if (empty($existingRelationship)) {
			\App\EventMedia::create(['eventID'=>$request->newItem, 'mediaID'=>$mediaID]);
		}
		return redirect('/editRelationships');
	}
}
