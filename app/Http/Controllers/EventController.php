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
	
	public function editForm($id) {
		
		$event = \App\Event::get()->where('id', intval($id))->toArray();
		if (empty($event)) {
			return redirect('/');
		}
		$event = current($event);
		
		$model = array();
		$model['name'] = $event['name'];
		$model['summary'] = $event['summary'];
		$model['date'] = $event['timelineDate'];
		$model['tags'] = \App\EventTag::get()->where('eventID', intval($id))->pluck('tag')->toArray();
		
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag')->toArray();
		return view('forms/editEvent')->with(['tags'=>$tags, 'model'=>$model]);
	}
	
	public function edit($id, Requests\CreateEventRequest $request) {
		$data = $request->all();
		$tags = $data['tags'];
		
		if ($data['summary'] == '') $data['summary'] = NULL;
		unset($data['_token']);
		unset($data['tags']);
		
		\App\EventTag::where('eventID', intval($id))->delete();
		foreach($tags as $tag) {
			\App\EventTag::create(['eventID'=>intval($id), 'tag'=>$tag]);
		}
		
		\App\Event::where('id', $id)->update($data);
		return redirect('/');
	}
	
	public function show($id) {
		$event = \App\Event::where('id', $id)->get()->toArray()[0];
		$media = \App\Media::join('event_media', 'media.id', '=', 'event_media.mediaID')->where('event_media.eventID', $id)->get()->toArray();
		return view('show/event')->with(['event'=>$event, 'media'=>$media]);
	}
	
	public function delete($id) {
		\App\Event::where('id', $id)->delete();
		\App\EventMedia::where('eventID', $id)->delete();
		\App\EventTag::where('eventID', $id)->delete();
		return redirect('/');
	}
}
