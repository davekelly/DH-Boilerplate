<?php

namespace Apiv1;
use Catalogue;

class CatalogueApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(array(
            'error' => true,
            'message' => 'Resource not found'),
            404
        );
	}


	public function listItems($format = null)
	{
		$catalogue = new Catalogue();
		$items = $catalogue->getAll();

		switch($format){

			case 'edf': 
				return \Response::make(
						\View::make(
							'catalogue.edf.index_edf', 
							array('items' => $items)
						), 
						200, 
						array('Content-Type' => 'application/xml')
					);
				break;
			default: 
				return \Response::json( $items );
				
		}

	}




	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id, $format = null)
	{
		$catalogue = new Catalogue();	
		$item = $catalogue->findOne( $id );

		switch($format){

			case 'edf': 
				return \Response::make(
						\View::make(
							'catalogue.edf.single_edf', 
							array('item' => $item)
						), 
						200, 
						array('Content-Type' => 'application/xml')
					);
				break;
			default: 
				return \Response::json($item);
				break;
		}
	}





}