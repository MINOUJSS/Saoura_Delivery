<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\size;

class Default_Size_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color=size::create([
            'user_id'=>'1',
            'name'=>'إفتراضي',
            'size'=>'Default'
        ]);
    }
}
