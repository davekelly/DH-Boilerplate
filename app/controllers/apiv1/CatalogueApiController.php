<?php

namespace Apiv1;
use Catalogue;

/**
 * @todo  Add EDF format output => not currently
 *        outputing any content in them...
 *        See show action for example (also needs to
 *        be added back into routes)
 */

class CatalogueApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogue = new Catalogue();
		$items = $catalogue->getAll();		

		return \Response::json( $items );
				
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