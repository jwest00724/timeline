<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class EditMediaRequest extends Request
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
		$path = Request::path();
		$id = explode("/", $path);
		$id = $id[count($id) - 1];
		
		$required = array(
			'name' 			=> 'required|unique:media,name,'.$id.',id',
			'series' 		=> 'required',
			'collection' 	=> 'required',
			'medium'		=> 'required',
			'timelineDate' 	=> 'required',
		);
		
		if ($data['series'] == 'newSeries') {
			$required['newSeriesName'] = 'required|unique:series,seriesName,'.$id.',id';
			$required['newSeriesAbbr'] = 'required|not_in:newSeries|unique:series,seriesAbbreviation,'.$id.',id';
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
