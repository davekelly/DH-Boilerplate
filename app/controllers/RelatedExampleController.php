<?php
/**
 * Gives an example of integration with the Europeana
 * search api.
 *
 * @see http://www.europeana.eu/portal/api-introduction.html
 */

use Guzzle\Http\Client;

class RelatedExampleController extends BaseController {

	
	/**
	 * Example of querying the Europeana API and return json
	 * results
	 * 
	 * @return [type] [description]
	 */
	public function getRelated()
	{
		$relatedTerm = 'Galway';
		$page 		 = 1;
		$rows		 = 2;
		$profile	 = 'standard';
		
		try{
	
			$europeanaApi = new Client( Config::get('europeana.api_endpoint_url'),
				array(
					'key' 		=> Config::get('europeana.api_key'),
					'query'		=> $relatedTerm,
					'profile'	=> $profile,
					'start'		=> $page,
					'rows'		=> $rows
				)
			);

			$request = $europeanaApi->get('search.json?wskey={key}&query={query}&profile={profile}&start={start}&rows={rows}');
			
			$response = $request->send();
			$data 	 = $response->json();

			var_dump($data);

		}catch( Exception $e){
			var_dump($exception->getMessage() . "\n");
		}

		die();
	}

	
}