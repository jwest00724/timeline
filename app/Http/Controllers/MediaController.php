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
		
		dd($request);
		
		return redirect('/');
	}
}
