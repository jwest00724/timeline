<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
	public function createForm() {
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag')->toArray();
		return view('forms/newEvent')->with(['tags'=>$tags]);
	}
	
    public function create(Requests\CreateEventRequest $request) {
		
		$eventData = array(
			'name' => $request['name'],
			'timelineDate' => $request['timelineDate']
		);
		
		if ($request['summary'] != '') {
			$eventData['summary'] = $request['summary'];
		}
		
		$event = \App\Event::create($eventData);
		
		foreach($request['tags'] as $tag) {
			\App\EventTag::create(['eventID'=>$event['id'], 'tag'=>$tag]);
		}
		
		return redirect('/');
	}
	
	public function editForm() {
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag')->toArray();
		return view('forms/editEvent')->with(['tags'=>$tags]);
	}
	
	public function edit() {
		dd('editing event');
	}
}
