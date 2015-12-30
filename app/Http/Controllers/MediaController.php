<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
	public function createForm() {
		$seriesAbbrToName = \App\Series::get()->pluck('seriesName', 'seriesAbbreviation')->toArray();
		
		return view('forms/newMedia')->with(['seriesAbbrToName'=>$seriesAbbrToName]);
	}
	
    public function create() {
		return redirect('/');
	}
}
