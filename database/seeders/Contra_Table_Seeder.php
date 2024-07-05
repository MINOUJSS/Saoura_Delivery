<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\contra;

class Contra_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text="<h1>سياسة خصوصية</h1>";
        $text.="<p>السياسة الخصوصية تحدد من طرف صاحب المتجر</p>";
        $contra = contra::create([
            'admin_id' =>1,
            'content'=>$text,                        
            'image' =>'/'
        ]);
    }
}
