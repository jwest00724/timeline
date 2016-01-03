<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class CreateMediaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		$data = Input::all();
		$required = array(
			'name' 			=> 'required|unique:media,name',
			'series' 		=> 'required',
			'collection' 	=> 'required',
			'medium'		=> 'required',
			'timelineDate' 	=> 'required',
		);
		
		if ($data['series'] == 'newSeries') {
			$required['newSeriesName'] = 'required|unique:series,seriesName';
			$required['newSeriesAbbr'] = 'required|not_in:newSeries|unique:series,seriesAbbreviation';
		}
		
		if ($data['collection'] == 'newCollection') {
			$required['newCollectionName'] = 'required|not_in:newCollection';
		}
		
		if ($data['medium'] == 'newMedium') {
			$required['newMediumName'] = 'required|not_in:newMedium';
		}
		
        return $required;
    }
}
