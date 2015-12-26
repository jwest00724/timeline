<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
	
	/* Display all media and events in a timeline */
    public function index() {
		
		$mediums = \App\Media::select('medium')->distinct()->get()->pluck('medium');
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag');
		
		$seriesToCollections = array();
		$series = \App\Series::get()->pluck('seriesAbbreviation');
		foreach($series as $thisSeries) {
			$seriesToCollections[$thisSeries] =
							\App\Media::select('collection')
							->where('series', $thisSeries)
							->distinct()
							->get()
							->pluck('collection')
							->toArray();
		}
		
		return view('timeline')->with(['tags'=>$tags, 'seriesToCollections'=>$seriesToCollections, 'mediums'=>$mediums]);
	}
}
