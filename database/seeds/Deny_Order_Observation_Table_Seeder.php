<?php

use Illuminate\Database\Seeder;
use App\deny_order_observation;

class Deny_Order_Observation_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obs1=deny_order_observation::create([
            'obs'=>'رقم الهاتف خاطئ'
        ]);
        $obs2=deny_order_observation::create([
            'obs'=>'طلب عن طريق الخطأ'
        ]);

        $obs3=deny_order_observation::create([
            'obs'=>'الزبون غير رأيه و إعتذر عن الطلب'
        ]);
    }
}
