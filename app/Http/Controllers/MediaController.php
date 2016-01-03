<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
	public function createForm() {
		$seriesAbbrToName = \App\Series::get()->pluck('seriesName', 'seriesAbbreviation')->toArray();
		$mediums = \App\Media::select('medium')->distinct()->get()->pluck('medium')->toArray();
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
		
		return view('forms/newMedia')->with(['seriesAbbrToName'=>$seriesAbbrToName, 'mediums'=>$mediums, 'series'=>$series, 'seriesToCollections'=>$seriesToCollections]);
	}
	
    public function create(Requests\CreateMediaRequest $request) {
		
		$data = $request->all();
		
		if ($data['series'] == 'newSeries') {
			$data['series'] = $data['newSeriesAbbr'];
			\App\Series::create(['seriesName'=>$data['newSeriesName'], 'seriesAbbreviation'=>$data['newSeriesAbbr']]);
		}
		
		if ($data['collection'] == 'newCollection') {
			$data['collection'] = $data['newCollectionName'];
		}
		
		if ($data['medium'] == 'newMedium') {
			$data['medium'] = $data['newMediumName'];
		}
		
		unset($data['_token']);
		unset($data['newSeriesAbbr']);
		unset($data['newSeriesName']);
		unset($data['newCollectionName']);
		unset($data['newMediumName']);
		if ($data['numberInCollection'] == '') unset($data['numberInCollection']);
		if ($data['credit'] == '') unset($data['credit']);
		if ($data['summary'] == '') unset($data['summary']);
		
		\App\Media::create($data);
		
		return redirect('/');
	}
	
	public function editForm($id) {
		
		$media = \App\Media::get()->where('id', intval($id))->toArray();
		if (empty($media)) {
			return redirect('/');
		}
		$media = current($media);
		
		$model = array();
		$model['name'] = $media['name'];
		$model['credit'] = $media['credit'];
		$model['series'] = $media['series'];
		$model['collection'] = $media['collection'];
		$model['numberInCollection'] = $media['numberInCollection'];
		$model['medium'] = $media['medium'];
		$model['summary'] = $media['summary'];
		$model['date'] = $media['timelineDate'];
		
		$seriesAbbrToName = \App\Series::get()->pluck('seriesName', 'seriesAbbreviation')->toArray();
		$mediums = \App\Media::select('medium')->distinct()->get()->pluck('medium')->toArray();
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
		
		return view('forms/editMedia')->with(['seriesAbbrToName'=>$seriesAbbrToName, 'mediums'=>$mediums, 'series'=>$series, 'seriesToCollections'=>$seriesToCollections, 'model'=>$model]);
	}
	
	public function edit($id, Requests\CreateMediaRequest $request) {
		
		$data = $request->all();
		
		unset($data['_token']);
		unset($data['newSeriesAbbr']);
		unset($data['newSeriesName']);
		unset($data['newCollectionName']);
		unset($data['newMediumName']);
		if ($data['numberInCollection'] == '') $data['numberInCollection'] = NULL;
		if ($data['credit'] == '') $data['credit'] = NULL;
		if ($data['summary'] == '') $data['summary'] = NULL;
		
		\App\Media::where('id', intval($id))->update($data);
		
		return redirect('/');
	}
	
	public function show($id) {
		$media = \App\Media::where('id', $id)->get()->toArray()[0];
		$events = \App\Event::join('event_media', 'events.id', '=', 'event_media.eventID')->where('event_media.mediaID', $id)->get()->toArray();
		return view('show/media')->with(['media'=>$media, 'events'=>$events]);
	}
}
