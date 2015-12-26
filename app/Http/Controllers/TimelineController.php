<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
	
	// Display all media and events in a timeline
    public function index() {
		
		// Get event tags
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag');
		
		return view('timeline')->with(['tags'=>$tags]);
	}
}
