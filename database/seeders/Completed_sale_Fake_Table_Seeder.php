<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class Completed_sale_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $completed=factory('App\Completed_Sale',50)->create();
    }
}
