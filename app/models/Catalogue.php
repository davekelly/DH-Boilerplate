<?php

class Catalogue extends \Eloquent{

	/**
	 * Db table
	 * @var string
	 */
	protected $table = 'catalogue_item';

	/**
	 * Properties that can be auto-filled
	 * @see http://laravel.com/docs/eloquent#mass-assignment
	 * @var array
	 */
	protected $fillable = array('title', 'description', 'location', 'image_url', 'thumb_url', 'active', 'geo_lon', 'geo_lat');


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


}