<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\how_to_ship;

class How_To_Ship_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text="<h1>طريقة توصيل الطلبات</h1>";
        $text.="<p>الطريقة تحدد من طرف صاحب المتجر</p>";
        $how_to_ship = how_to_ship::create([
            'admin_id' =>1,
            'content'=>$text,                        
            'image' =>'/'
        ]);
    }
}
