<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class Discount_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $discount=factory('App\discount',10)->create();
    }
}
