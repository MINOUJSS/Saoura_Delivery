<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class Reating_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reating=factory('App\reating',100)->create();
    }
}
