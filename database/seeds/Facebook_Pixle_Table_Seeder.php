<?php

use Illuminate\Database\Seeder;
use App\facebook_pixle;

class Facebook_Pixle_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $code="
        <script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '2900178976897455');
	fbq('track', 'PageView');
  </script>";
  $code.='<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2900178976897455&ev=PageView&noscript=1"
/></noscript>';
        $pixle=facebook_pixle::create([
            'active'=> 1,
            'code' => $code
        ]);
    }
}
