<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sub_Category_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sub_category=factory('App\Sub_Category',15)->create();
    }
}
