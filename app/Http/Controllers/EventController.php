<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function create(Requests\CreateEventRequest $request) {
		
		\App\Event::create([
			'name'=>$request['name'],
			'summary'=>$request['summary'],
			'timelineDate'=>$request['timelineDate']
		]);
		
		return redirect('/');
	}
}
