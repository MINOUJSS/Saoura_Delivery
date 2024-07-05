<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Consumer;

class Default_Consumer_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consumer=consumer::create([
            'name'=>'Default',
            'lastname'=>'Consummer',
            'password'=>'Default',
            'email'=>'DefaultConsummer@Saoura.com',
            'telephone'=>'0000000000',
            'address'=>'Default Consummer Address',
        ]);
    }
}
