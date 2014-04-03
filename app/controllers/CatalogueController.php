<?php

class CatalogueController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
       	$this->beforeFilter('auth', array('except' => array('index', 'show', 'search')));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogue = new Catalogue();
		$items = $catalogue->getAll();

		return View::make('catalogue.index', array(
			'items' => $items
			) 
		);
	}

	/**
	 * Simple search across selected Catalogue
	 * fields
	 * 
	 * @return \View
	 */
	public function search()
	{
		$results = null;

		$searchTerm = Input::get('term');

		if($searchTerm){
			$catalogue = new Catalogue();
			$results = $catalogue->simpleSearch($searchTerm);
		}

		return View::make('catalogue.search', array(
			'items' 		=> $results, 
			'searchTerm'	=> $searchTerm
			) 
		);
	}

	/**
	 * Import the spreadsheet to the database
	 * @return void
	 */
	public function importCsv()
	{
		$catalogue = new Catalogue();
		$numberImported = $catalogue->importCsv('CLA_Contents.csv');		// in /app/data

		var_dump($numberImported);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('catalogue.form');	
	}	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$catalogue 	= new Catalogue();
		$newItem 	= $catalogue->addNew($catalogue);
		

		if( $newItem instanceof Catalogue){
			Session::flash('flash_notice', array(
					'type' => 'success', 
					'message' => Lang::get('messages.catalogue_item_created')
				)
			);
			return Redirect::to('/catalogue/' . $newItem->id . '/edit');
		}
		
		// means $newItem is a Validator => has validation errors
		return Redirect::to('/catalogue/create')
						->withErrors( $newItem )
						->withInput();
			
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id)
	{
		$catalogue = new Catalogue();
		$id = (is_numeric($id) ? (int) $id : false ); 
		$item = $catalogue->findOne( $id );

		return View::make('catalogue.single', array(
			'item' => $item) 
		);	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$catalogue = Catalogue::find($id);

		return View::make('catalogue.form', array(
			'item'	=> $catalogue,						// bind object to form...
			'formData' => array(
				'url' 			=> '/catalogue/' . $id,
				)
			) 
		);		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$catalogue 	= Catalogue::find($id);
		$result 	= $catalogue->doUpdate($catalogue);
		if( $result instanceof Validator){
			return Redirect::to('/catalogue/'. $id . '/edit')
							->withErrors($result)
							->withInput();
		}

		Session::flash('flash_notice', array(
				'type' 		=> 'success', 
				'message' 	=> Lang::get('messages.catalogue_item_saved')
			)
		);
		return Redirect::to('/catalogue/' . $id . '/edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}