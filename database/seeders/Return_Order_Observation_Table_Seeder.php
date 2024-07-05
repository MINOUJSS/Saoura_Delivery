<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\return_order_observation;
class Return_Order_Observation_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obs1=return_order_observation::create([
            'obs'=>'رفض إستلام المنتج من طرف الزبون'
        ]);
        $obs2=return_order_observation::create([
            'obs'=>'عدم التمكن من التواصل مع الزبون بعد عدة محاولات'
        ]);

        $obs3=return_order_observation::create([
            'obs'=>'الزبون غير رأيه و إعتذر عن الطلب'
        ]);
    }
}
