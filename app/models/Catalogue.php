<?php

class Catalogue extends \Eloquent{

	/**
	 * Db table
	 * @var string
	 */
	protected $table = 'catalogue_item';

	/**
	 * Properties that can be auto-filled
	 * @var array
	 */
	protected $fillable = array('title', 'description', 'location', 'image_url', 'thumb_url', 'active', 'geo_lon', 'geo_lat');

	/**
	 * Properties to hide in JSON output
	 * @var Mixed
	 */
	protected $hidden = array('updated_at', 'created_at') ;

	/**
	 * Return all items
	 * @param  boolean $hideInactive 
	 * @return \Eloquent\Colection
	 */
	public function getAll( $hideInactive = true )
	{
		if( $hideInactive ){
			return self::where('active', '=', true)->get();
		}

		return self::all();
	}

	/**
	 * Return a single record
	 * 
	 * @param  int    $id
	 * @return \Eloquent\Collection
	 */
	public function findOne( $id){
		return self::find($id);
	}

	public function addNew( Catalogue $catalogue )
	{
		$data = Input::all();
		
		$validator = Validator::make($data, $catalogue->getValidationRules() );
		if( $validator->passes() ){
			$catalogue->fill(Input::all());
			$catalogue->save();
			return $catalogue;
		}

		return $validator;
	}


	/**
	 * Save an update to a catalogue item
	 * 
	 * @param  Catalogue $catalogue - object to update
	 * @return [type]               [description]
	 */
	public function doUpdate( Catalogue $catalogue )
	{
		
		$data 		= Input::all();
		$validator 	= Validator::make($data, $catalogue->getValidationRules());

		if ($validator->passes()) {
			
			$catalogue->title 		= Input::get('title'); 
			$catalogue->description = Input::get('description'); 
			$catalogue->location 	= Input::get('location'); 
			
			if( isset(  $data ) && !empty( $data )){
				$catalogue->image_url 	= Input::get('image_url'); 
			}

			if( isset($data['thumb_url'] ) && !empty($data['thumb_url']) ){
				$catalogue->thumb_url 	= Input::get('thumb_url'); 
			}

			$catalogue->active 	= Input::get('active'); 

			if(isset($data['geo_lon']) && $data['geo_lon'] !== '0.000000'){
				$catalogue->geo_lon = Input::get('geo_lon'); 
			}
			if(isset($data['geo_lat']) && $data['geo_lat'] !== '0.000000'){
				$catalogue->geo_lat = Input::get('geo_lat'); 
			}
		
			$catalogue->save();

			return $catalogue;
		}

		return $validator;
	}

	/**
	 * Return a set of rules for validating properties
	 * 
	 * @return mixed $rules
	 */
	protected function getValidationRules()
	{
		return array(
			'title' 		=> 'required|max:255',
			'description'	=> 'required',
			'location'		=> 'alpha|max:255',
			'geo_lat'		=> 'numeric',
			'geo_lon'		=> 'numeric',
			'image_url'		=> 'url|max:255',
			'thumb_url'		=> 'url|max:255',
			'active'		=> 'numeric|max:1'
		);
	}
}