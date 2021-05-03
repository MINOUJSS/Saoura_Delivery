<?php

use Illuminate\Database\Seeder;
use App\color;

class Default_Color_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color=color::create([
            'user_id'=>'1',
            'name'=>'إفتراضي',
            'code'=>'#7a797a'
        ]);
    }
}
