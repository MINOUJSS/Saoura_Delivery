<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Category',7)->create();
    }
}
