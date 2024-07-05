<?php
namespace Database\Seeders;
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
        $code='<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NMWMGYJ1TR"></script>';
        $code.="
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-NMWMGYJ1TR');
        </script>";
        $analityc=google_analytic::create([
            'active'=> 1,
            'code' => $code
        ]);
    }
}
