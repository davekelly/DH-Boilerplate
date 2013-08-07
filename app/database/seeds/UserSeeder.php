<?php

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email'     => Config::get('author.primary_author_email'),
            'password'  => Hash::make('example')
        ));

    }
}