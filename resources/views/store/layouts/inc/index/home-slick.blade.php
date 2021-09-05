@if($slids->count()>0)
<div id="home-slick">
    @foreach($slids as $slid)
    <!-- banner -->    
        @if($slid->view_type==1)
        <!--start style 1-->
        <div class="banner banner-1 text-center">
            <img class="hidden-xs" src="{{url('/admin-css/uploads/images/deals/'.$slid->image)}}" alt="" height="489" width="870">
            <img class="hidden-lg hidden-md hidden-sm" src="{{url('/admin-css/uploads/images/deals/'.$slid->image)}}" alt="" height="245" width="435">        
            <div class="banner-caption text-center">
        
                                
                <a href="{{$slid->link}}"><button class="primary-btn">أطلبه الآن</button></a>
                   
            </div>        
        </div>
        <!--end style 1-->
        @else
        <!--start style 2-->
        <div class="banner banner-1">
            <img class="hidden-xs" src="{{url('/admin-css/uploads/images/deals/'.$slid->image)}}" alt="" height="489" width="870">
            <img class="hidden-lg hidden-md hidden-sm" src="{{url('/admin-css/uploads/images/deals/'.$slid->image)}}" alt="" height="245" width="435">        
            <div class="banner-caption text-center" style="background-color:#000;opacity:60% !important; height:100%;width:100%;">
                <div style="background-color:#000;opacity:100% !important;padding:15%; ">
                    
                <h1 class="hidden-xs" style="color:#4ae215;">{{$slid->title}}</h1>
                <h3 class="hidden-lg hidden-md hidden-sm" style="color:#4ae215;">{{$slid->title}}</h3>
                <h3 class="hidden-xs white-color font-weak">{!!substr($slid->daitels,0,200)!!}</h3>            
                <a href="{{$slid->link}}"><button class="primary-btn">أطلبه الآن</button></a>
                </div>            
            </div>        
        </div>
        <!--end style 2-->
        @endif
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