<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
	/* Date sorting (chronological) */
	public function dateCompare($a, $b) {
		return strcmp($b, $a) * -1;
	}
	
	/* Event and media sorting (alphabetical) */
	public function itemCompare($a, $b) {
		return strcmp($a['name'], $b['name']);
	}
	
	/* Display timeline */
    public function index() {
		
		/* Timeline info */
		$eventDates = \App\Event::select('timelineDate')->distinct()->get()->pluck('timelineDate')->toArray();
		$mediaDates = \App\Media::select('timelineDate')->distinct()->get()->pluck('timelineDate')->toArray();
		$dates = array_unique(array_merge($eventDates, $mediaDates), SORT_REGULAR);
		usort($dates, array('\App\Http\Controllers\TimelineController', 'dateCompare'));
		
		$media = array();
		$events = array();
		foreach($dates as $date) {
			$eventsForThisDate = \App\Event::get()->where('timelineDate', $date)->toArray();
			$mediaForThisDate = \App\Media::get()->where('timelineDate', $date)->toArray();
			usort($eventsForThisDate, array('\App\Http\Controllers\TimelineController', 'itemCompare'));
			usort($mediaForThisDate, array('\App\Http\Controllers\TimelineController', 'itemCompare'));
			$media[$date] = $mediaForThisDate;
			$events[$date] = $eventsForThisDate;
		}
		
		/* Filter info */
		$mediums = \App\Media::select('medium')->distinct()->get()->pluck('medium')->toArray();
		$tags = \App\EventTag::select('tag')->distinct()->get()->pluck('tag')->toArray();
		$series = \App\Series::get()->pluck('seriesAbbreviation');
		sort($mediums);
		sort($tags);
		
		$eventIDToTags = array();
		$eventIDs = \App\Event::get()->pluck('id');
		foreach($eventIDs as $eventID) {
			$eventIDToTags[$eventID] =
							\App\EventTag::select('tag')
							->where('eventID', $eventID)
							->get()
							->pluck('tag')
							->toArray();
		}
		
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
		
		/* Event-media connection info */
		$eventMediaPairs = \App\EventMedia::get(array('eventID', 'mediaID'))->toArray();
				
		return view('timeline')->with(['tags'=>$tags, 'eventIDToTags'=>$eventIDToTags, 'eventMediaPairs'=>$eventMediaPairs, 'seriesToCollections'=>$seriesToCollections, 'mediums'=>$mediums, 'dates'=>$dates, 'events'=>$events, 'media'=>$media]);
	}
}
