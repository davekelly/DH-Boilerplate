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
	 * fields from $this->fillable to exclude from simple search
	 * @var array
	 */
	protected $excludeFromSimpleSearch = array('image_url', 'thumb_url', 'active', 'geo_lat', 'geo_lon');


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
	 * Simple search that looks across the fields in $this->fillable. Fields
	 * can be excluded by adding to $this->excludeFromSimpleSearch
	 * 
	 * @param  string $term search term
	 * @return \Eloquent\Colection
	 */
	public function simpleSearch($term)
	{
		$query = $this->select();
		$isFirst = true;			// flag for first element in $this->fillable

		foreach($this->fillable as $searchField){

			if(!in_array($searchField, $this->excludeFromSimpleSearch)){
				if($isFirst){
					$query->where($searchField,  'like', '%'. $term . '%');
					$isFirst = false;
				}else{
					$query->orWhere($searchField,  'like', '%'. $term . '%');
				}
			}
		}

		return $query->get();
		
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

	/**
	 * Import a csv file (stored at /app/data). 
	 * 
	 * @todo  Requires some configuration to match $this->fillable 
	 *        fields with CSV column structure
	 * 
	 * @param  string $fileName - name of file to import
	 * @return string - printable msg with num of rows imported
	 */
	public function importCsv($fileName)
	{
		$row = 1;
		
		$path = dirname(__FILE__);
	 	$file = $path . '/../data/' . $fileName;

		$in = fopen($file, 'r');

		// Order of the columns in the CSV:
		// Script,Date,CLA,Shelfmark,Provenance,Name,Notes
		
		while (($data = fgetcsv($in, 10000, ',')) !== false) {	

			$d = array(
				'script' 		=> trim($data[0]), 
				'date' 			=> trim($data[1]), 
				'cla' 			=> trim($data[2]), 
				'shelfmark' 	=> trim($data[3]), 
				'provenance' 	=> trim($data[4]), 
				'name' 			=> trim($data[5]), 
				'notes' 		=> trim($data[6])
			);

			Catalogue::create($d);				

		   	$row++;
		}
		fclose($in);

		return "Imported $row rows";
	}
}