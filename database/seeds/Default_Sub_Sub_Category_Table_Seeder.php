<?php

use Illuminate\Database\Seeder;
use App\Sub_Sub_Category;

class Default_Sub_Sub_Category_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_sub_category=Sub_Sub_Category::create([
            'name'=>'بدون تصنيف',
            'slug'=>'بدون-تصنيف',
            'sub_category_id'=>1,
            'icon'=>'/'
        ]);
    }
}
