<?php

use CursoLaravel\Entities\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        factory('CursoLaravel\Entities\Client', 10)->create();
    }
}
