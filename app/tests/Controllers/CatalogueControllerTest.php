<?php
/**
 * Test if Catalogue routes are loading.
 *
 * If not using Catalogue route, you should delete this file.
 */
class CatalogueControllerTest extends TestCase {


	/**
	 * Test pages are loading ok
	 *
	 * @return void
	 */
	public function testCatalogueIndexLoad()
	{
		$crawler = $this->client->request('GET', '/catalogue');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testCatalogueShowLoad()
	{
		$crawler = $this->client->request('GET', '/catalogue/1');

		$this->assertTrue($this->client->getResponse()->isOk());
	}


	public function testCatalogueShowText()
	{
		$crawler = $this->client->request('GET', '/catalogue/1');

		// Sample item title from db seeding
		$this->assertCount(1, $crawler->filter('h1:contains("Test title")'));
	}

	
	public function testCatalogueEditLoad()
	{
		$crawler = $this->client->request('GET', '/catalogue/1/edit');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testCatalogueCreateLoad()
	{
		$crawler = $this->client->request('GET', '/catalogue/create');

		$this->assertTrue($this->client->getResponse()->isOk());
	}


}