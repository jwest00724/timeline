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
			'name' 			=> 'required',
			'series' 		=> 'required',
			'collection' 	=> 'required',
			'medium'		=> 'required',
			'timelineDate' 	=> 'required',
		);
		
		if ($data['series'] == 'newSeries') {
			$required['newSeriesName'] = 'required';
			$required['newSeriesAbbr'] = 'required';
		}
		
		if ($data['collection'] == 'newCollection') {
			$required['newCollectionName'] = 'required';
		}
		
		if ($data['medium'] == 'newMedium') {
			$required['newMediumName'] = 'required';
		}
		
        return $required;
    }
}
