<?php

use Illuminate\Database\Seeder;
use App\brand;

class Default_Brand_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand=brand::create([
            'user_id'=>1,
            'name'=>'بدون علامة تجارية',
            'image'=>'/'
        ]);
    }
}
