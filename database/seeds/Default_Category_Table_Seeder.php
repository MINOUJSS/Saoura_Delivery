<?php

use Illuminate\Database\Seeder;
use App\category;

class Default_Category_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=category::create([
            'name'=>'بدون تصنيف',
            'image'=>'/',
            'icon'=>'/'
        ]);
    }
}
