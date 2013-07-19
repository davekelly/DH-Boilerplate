<?php

class CatalogueTestDataSeeder extends Seeder {

    public function run()
    {
        DB::table('catalogue_item')->delete();

        Catalogue::create(array(
            'title' => 'Test title',
            'description' => 'Some example content',
            'location'  => 'Galway',
            'image_url' => 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( Config::get('author.primary_author_email') ) ) ) . '?&s=400',
            'thumb_url' => 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( Config::get('author.primary_author_email') ) ) ) . '?&s=60',
            'geo_lon'   => 53.271944, 
            'geo_lat'   => -9.048889,
            'active' => 1
            
        ));

    }
}