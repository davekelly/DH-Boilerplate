<?php

class CatalogueTestDataSeeder extends Seeder {

    public function run()
    {
        DB::table('catalogue_item')->delete();

        Catalogue::create(array(
            'title' => 'Test title',
            'description' => 'Some example content',
            'location'  => 'Galway',
            'image_url' => 'http://placehold.it/570x300',
            'thumb_url' => 'http://placehold.it/75x75',
            'geo_lon'   => 53.271944, 
            'geo_lat'   => -9.048889,
            'active' => 1
            
        ));

        Catalogue::create(array(
            'title' => 'A second test title',
            'description' => 'Some more example content',
            'location'  => 'Galway',
            'image_url' => 'http://placehold.it/570x300',
            'thumb_url' => 'http://placehold.it/75x75',
            'geo_lon'   => 53.271944, 
            'geo_lat'   => -9.048889,
            'active' => 1
            
        ));

        // ...or you could do a CSV Import to seed the db
        // 
        // You'll need to configure the importCsv function 
        // in models/Catalogue to use this...
        // ----------------------------------------------
        // $catalogue = new Catalogue();
        // $catalogue->importCsv('my_csv_catalogue.csv');      // in /app/data


    }
}