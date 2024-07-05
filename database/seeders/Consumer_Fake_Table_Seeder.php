<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class Consumer_Fake_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consumer=factory('App\Consumer',10)->create();
    }
}
