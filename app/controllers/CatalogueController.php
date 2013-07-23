<?php

class CatalogueController extends \BaseController {

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
			'items' => $items) 
		);
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
			'item'	=> $catalogue,
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