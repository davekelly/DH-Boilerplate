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

		if(function_exists('jsonld_compact')){
			// create json-ld for translator
        	$context    = (object)$item->getJsonLdContext();
        	$doc        = $item->mapToJsonLdContext($item);

        	// compact a document according to a particular context
        	// see: http://json-ld.org/spec/latest/json-ld/#compacted-document-form
        	$item = jsonld_compact($doc, $context);
		}

		return \Response::json($item);
	}





}