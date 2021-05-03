<?php

use Illuminate\Database\Seeder;
use App\supplier;

class Default_Supplier_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier=supplier::create([
            'name'=>'Soura Delivery',
            'email'=>'SaouraDelivery@gmail.com',
            'mobile'=>'O661752052',
            'address'=>'hai el badr bechar'
        ]);
    }
}
