@if($slids->count()>0)
<div id="home-slick">
    @foreach($slids as $slid)
    <!-- banner -->
    <div class="banner banner-1">
        <img src="{{url('/admin-css/uploads/images/deals/'.$slid->image)}}" alt="" height="489" width="870">
        <div class="banner-caption text-center" style="background-color:#000;opacity:60% !important; height:100%;width:100%;">
            <div style="background-color:#000;opacity:100% !important;padding:15%; ">
            <h1 style="color:#4ae215;">{{$slid->title}}</h1>
            <h3 class="white-color font-weak">{{$slid->daitels}}</h3>            
            <a href="{{$slid->link}}"><button class="primary-btn">إشتري الآن</button></a>
            </div>            
        </div>        
    </div>
    <!-- /banner -->
    @endforeach

    {{-- <!-- banner -->
    <div class="banner banner-1">
        <img src="{{url('store')}}/img/banner02.jpg" alt="">
        <div class="banner-caption">
            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
            <button class="primary-btn">Shop Now</button>
        </div>
    </div>
    <!-- /banner -->

    <!-- banner -->
    <div class="banner banner-1">
        <img src="{{url('store')}}/img/banner03.jpg" alt="">
        <div class="banner-caption">
            <h1 class="white-color">New Product <span>Collection</span></h1>
            <button class="primary-btn">Shop Now</button>
        </div>
    </div>
    <!-- /banner --> --}}
</div>
@endif