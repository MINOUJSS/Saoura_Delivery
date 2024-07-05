<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\about_us;

class About_Us_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text="<h1>من نحن</h1>";
        $text.="<p>التعريف بالمتجر و خدماته.</p>";
        $how_to_ship = about_us::create([
            'admin_id' =>1,
            'content'=>$text,                        
            'image' =>'/'
        ]);
    }
}
