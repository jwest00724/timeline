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
	
	public function editForm() {
		dd('displaying edit media form');
	}
	
	public function edit() {
		dd('editing media');
	}
}
