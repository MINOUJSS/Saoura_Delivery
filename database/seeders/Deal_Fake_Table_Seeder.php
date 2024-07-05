<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class Deal_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deal=factory('App\deal',3)->create();
    }
}
