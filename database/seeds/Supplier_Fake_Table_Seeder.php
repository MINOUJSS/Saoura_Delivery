<?php

use Illuminate\Database\Seeder;

class Supplier_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier=factory('App\supplier',5)->create();
    }
}
