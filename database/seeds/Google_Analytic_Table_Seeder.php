<?php

use Illuminate\Database\Seeder;
use App\google_analytic;

class Google_Analytic_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analityc=google_analytic::create([
            'active'=> 0,
            'code' => 'ألصق كود التتبع هنا و فعّل التتبع.'
        ]);
    }
}
