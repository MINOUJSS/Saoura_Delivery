<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\setting;

class setting_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = setting::create([
            'var' =>'store_name',
            'display_var'=>'إسم المتجر',                        
            'type' =>1,
            'value'=>'ساورة دليفري'
        ]);
        $email = setting::create([
            'var' =>'email',
            'display_var'=>'البريد الإلكتروني',                        
            'type' =>1,
            'value'=>'saouradelivery@gmail.com'                
        ]);
        
        $address = setting::create([
            'var' =>'address',
            'display_var'=>'العنوان',                        
            'type' =>1,
            'value'=>'حي البدر بشار-الجزائر'                
        ]);

        $phone = setting::create([
            'var' =>'phone',
            'display_var'=>'رقم الهاتف',                        
            'type' =>1,
            'value'=>'0661752052'                
        ]);

        $facebook = setting::create([
                'var' =>'facebook',
                'display_var'=>'صفحة الفيسبوك',                        
                'type' =>1,
                'value'=>'https://www.facebook.com/saoura.delivery.7'                
            ]);

            $youtube = setting::create([
                'var' =>'youtube',
                'display_var'=>'يوتيوب',                        
                'type' =>1,
                'value'=>'https://www.youtube.com/channel/UCI8WJx13xbdkczkZLBmOwmw'                
            ]);

            $twitter = setting::create([
                'var' =>'twitter',
                'display_var'=>'تويتر',                        
                'type' =>1
                // 'value'=>''                
            ]);

            $instagram = setting::create([
                'var' =>'instagram',
                'display_var'=>'أنستاغرام',                        
                'type' =>1
                // 'value'=>''                
            ]);
    }
}
