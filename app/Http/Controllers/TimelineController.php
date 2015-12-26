<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
	
	/* Display all media and events in a timeline */
    public function index() {
		
		/* Timeline info */
		$eventDates = \App\Event::select('timelineDate')->distinct()->get()->pluck('timelineDate')->toArray();
		$mediaDates = \App\Media::select('timelineDate')->distinct()->get()->pluck('timelineDate')->toArray();
		$dates = array_unique(array_merge($eventDates, $mediaDates), SORT_REGULAR);
		
		$media = array();
		$events = array();
		foreach($dates as $date) {
			$eventsForThisDate = \App\Event::get()->where('timelineDate', $date)->toArray();
			$mediaForThisDate = \App\Media::get()->where('timelineDate', $date)->toArray();
			sort($eventsForThisDate);
			sort($mediaForThisDate);
			$media[$date] = $mediaForThisDate;
			$events[$date] = $eventsForThisDate;
		}
		
		/* Filter info */
		$mediums = \App\Media::select('medium')->distinct()->get()->pluck('medium');
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag');
		$series = \App\Series::get()->pluck('seriesAbbreviation');
		
		$seriesToCollections = array();
		foreach($series as $thisSeries) {
			$seriesToCollections[$thisSeries] =
							\App\Media::select('collection')
							->where('series', $thisSeries)
							->distinct()
							->get()
							->pluck('collection')
							->toArray();
		}
		
		return view('timeline')->with(['tags'=>$tags, 'seriesToCollections'=>$seriesToCollections, 'mediums'=>$mediums, 'dates'=>$dates, 'events'=>$events, 'media'=>$media]);
	}
}