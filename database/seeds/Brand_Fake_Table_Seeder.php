<?php

use Illuminate\Database\Seeder;

class Brand_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand=factory('App\brand',5)->create();
    }
}
