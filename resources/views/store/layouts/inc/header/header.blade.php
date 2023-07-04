<header>
    <!-- top Header -->
    <div class="hidden-xs hidden-sm" id="top-header">
        <div class="container">
            <div class="pull-left">
                {{-- <img src="{{url('store/img/drapo.png')}}" height="20"> --}}
                <span>التوصيل لـ 58 ولاية والدفع عند الإستلام!</span>
            </div>
            <div class="pull-right">
                <a class="header-top-links" href="tel:0668657120" target="blank">0660007370 <i class="fa fa-phone" style="color:rgb(43, 7, 250)"></i></a> &ThinSpace;|&ThinSpace;
                <a href="https://wa.me/213660007370" target="blank"> 668657120 (213+) <i class="fa fa-whatsapp" style="color:#0f0"></i></a>
                <a class="header-top-links" href="https://t.me/SaouraDelivery" target="blank">إشترك معنا على قناة التليغرام ليصلك كل جديد <i class="fa fa-telegram" style="color:rgb(43, 7, 250)"></i></a>
                {{-- <ul class="header-top-links">
                    <li><a href="#">المتجر</a></li>
                    <li><a href="#">النشرة الإخبارية</a></li>
                    <li><a href="{{route('faq')}}">أسئلة شائعة</a></li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ع <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">العربية (ع)</a></li>
                            <li><a href="#">الروسية (Ru)</a></li>
                            <li><a href="#">الفرنسية (FR)</a></li>
                            <li><a href="#">الإسبانية (Es)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">دج <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">الدينار الجزائري (DA)</a></li>
                            <li><a href="#">EUR (€)</a></li>
                        </ul>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <!--container in lg-->
        <div class="container hidden-sm hidden-xs">            
            <div class="hidden-xs hidden-sm pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="{{url('/')}}">
                        <img src="{{url('store')}}/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form action="{{route('store.product.find')}}" method="GET" enctype="multipart/form-data">
                        <div class="form-group {{$errors->has('query')? 'has-error': ''}}">
                        <input name="query" class="input search-input" type="text" value="@if(Request::url()==route('store.product.find')){{$query}}@endif" placeholder="أدخل كلمة البحث">
                        </div>
                        <select name="category" class="input search-categories">
                            <option value="0" @if(Request::url()==route('store.product.find')  && $category_id ==0){{'selected'}}@endif>كل الأقسام</option>
                            @foreach(get_all_categories() as $index => $category)
                        <option value="{{$category->id}}" @if(Request::url()==route('store.product.find')  && $category_id ==$category->id){{'selected'}}@endif>{{$category->name}}</option>
                            @endforeach
                            {{-- <option value="1">التصنيف 01</option>
                            <option value="1">التصنيف 02</option> --}}
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <!--show this in col-lg -->
            <div class="hidden-xs hidden-sm pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                        </div>
                        <ul class="custom-menu">
                            @if(Auth::guard('consumer')->check())
                            <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-user-o"></i> حسابي</a></li>
                            <li><a href="{{route('consumer.wish_list')}}"><i class="fa fa-heart-o"></i> قائمة امنياتي</a></li>
                            <li><a href="{{route('consumer.compar_list')}}"><i class="fa fa-exchange"></i> مقارنة</a></li>
                            @if(session()->has('cart'))
                            <li><a href="{{route('checkout')}}"><i class="fa fa-check"></i> أطلب الآن</a></li>                                                        
                            @endif
                            <li><a href="{{route('consumer.logout')}}"><i class="fa fa-sign-out"></i></i> تسجيل الخروج</a></li>                                 
                            @else 
                            <li><a href="{{route('consumer.login')}}"><i class="fa fa-sign-in"></i> تسجيل الدخول</a></li>
                            <li><a href="{{route('consumer.register')}}"><i class="fa fa-user-plus"></i> إنشاء حساب</a></li>
                            @endif
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li id="cart_section" class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{session()->has('cart')?session()->get('cart')->totalQty:'0'}}</span>
                            </div>
                            <strong class="text-uppercase">السلة:</strong>
                            <br>
                            <span>{{session()->has('cart')?session()->get('cart')->totalPrice:'0.00'}} دج</span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    @if(session()->has('cart'))
                                    @foreach(session()->get('cart')->items as $item)
                                    {{-- {{dd($item['title'])}} --}}
                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">{{$item['price']}} دج<span class="qty"> الكمية:{{$item['qty']}}</span></h3>
                                            <h2 class="product-name"><a href="{{url('product/'.get_product_data_from_id($item['id'])->slug)}}">{{$item['title']}}</a></h2>
                                        </div>
                                        <a href="{{route('cart.remove',$item['id'])}}"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                    </div>
                                    @endforeach
                                    @else 
                                   <div class="product product-widget">
                                   السلة فارغة     
                                    </div>              
                                    @endif
                                    {{-- <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="{{url('store')}}/img/thumb-product01.jpg" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price"> 32.50 دج<span class="qty">x3</span></h3>
                                            <h2 class="product-name"><a href="#">اسم المنتج هنا</a></h2>
                                        </div>
                                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                    </div> --}}
                                </div>
                                @if(session()->has('cart'))
                                <div class="shopping-cart-btns">
                                    <a href="{{route('cart.show')}}"><button class="main-btn">عرض محتوى السلة</button></a>
                                    <a href="{{route('checkout')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"></i> أطلب الآن</button></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
            <!--end show this in col-lg-->
            <!--show this in col-xs -->
            {{-- <nav class="hidden-lg hidden-md navbar navbar-default">
                <div class="container">
                    <div class="pull-right">
                        <ul class="header-btns">
                            <!--search btn-->
                            <li class="xs-search-btn">
                                <button class="header-btns-icon"><i class="fa fa-search"></i></button>
                            </li>
                            <!-- Account -->
                            
                            <!-- /Account -->
        
                            <!-- Cart -->
                            <li id="xs_cart_section" class="header-cart dropdown default-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="qty">{{session()->has('cart')?session()->get('cart')->totalQty:'0'}}</span>
                                    </div>
                                    <strong class="text-uppercase">السلة:</strong>
                                    <br>
                                    <span>{{session()->has('cart')?session()->get('cart')->totalPrice:'0.00'}} دج</span>
                                </a>
                                <div class="custom-menu">
                                    <div id="shopping-cart">
                                        <div class="shopping-cart-list">
                                            @if(session()->has('cart'))
                                            @foreach(session()->get('cart')->items as $item)                                            
                                            <div class="product product-widget">
                                                <div class="product-thumb">
                                                    <img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-price">{{$item['price']}} دج<span class="qty"> الكمية:{{$item['qty']}}</span></h3>
                                                    <h2 class="product-name"><a href="{{url('product/'.$item['id'])}}">{{$item['title']}}</a></h2>
                                                </div>
                                                <a href="{{route('cart.remove',$item['id'])}}"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                            @endforeach
                                            @else 
                                           <div class="product product-widget">
                                           السلة فارغة
                                            </div>              
                                            @endif                                            
                                        </div>
                                        @if(session()->has('cart'))
                                        <div class="shopping-cart-btns">
                                            <a href="{{route('cart.show')}}"><button class="main-btn">عرض محتوى السلة</button></a>
                                            <a href="{{route('checkout')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"></i> الدفع</button></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <!-- /Cart -->
        
                            <!-- Mobile nav toggle-->
                            <li class="nav-toggle">
                                <button class="menu-btn nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                            </li>
                            <!-- / Mobile nav toggle -->
                        </ul>
                    </div>
                    <!---->
                    <div id="xs-search-form" class="container" style="display: none">
                    <div class="row text-center">
                    <!-- Search -->                    
                <div class="col-12 header-search">
                    <form action="{{route('store.product.find')}}" method="GET" enctype="multipart/form-data">
                        <div class="form-group {{$errors->has('query')? 'has-error': ''}}">
                        <input name="query" class="input search-input" type="text" value="@if(Request::url()==route('store.product.find')){{$query}}@endif" placeholder="أدخل كلمة البحث">
                        </div>
                        <select name="category" class="input search-categories">
                            <option value="0" @if(Request::url()==route('store.product.find')  && $category_id ==0){{'selected'}}@endif>كل التصنيفات</option>
                            @foreach(get_all_categories() as $index => $category)
                        <option value="{{$category->id}}" @if(Request::url()==route('store.product.find')  && $category_id ==$category->id){{'selected'}}@endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
                    </div>
                </div>
                    <!---->
                </div>
              </nav> --}}
            <!--end show this in col-xs-->
        </div>
        <!--/container in lg-->
        <!--container in sm-->
        <div class="container-fliud hidden-lg hidden-md">
            <!--add telegram btn hear-->
            <div class="header-text-div text-center">
                
            </div>
            <!--end add telegram btn hear-->
                <div class="header-text-div text-center">
                    <a class="header-top-links" href="tel:0668657120" target="blank" style="color:#fff;">0660007370 <i class="fa fa-phone" style="color:rgb(94, 140, 225)"></i></a>|
                <a href="https://wa.me/213660007370" target="blank" style="color:#fff;"> 668657120 (213+) <i class="fa fa-whatsapp" style="color:#0f0"></i></a><br>
                <a class="header-top-links" href="https://t.me/SaouraDelivery" target="blank" style="color:#fff;">قناتنا على التليغرام <i class="fa fa-telegram" style="color:rgb(78, 91, 236)"></i></a>    
                <p>التوصيل لـ 58 ولاية والدفع عند الإستلام</p>                    
                </div>           
            <div class="hidden-xs hidden-sm pull-left">                
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="{{url('/')}}">
                        <img src="{{url('store')}}/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form action="{{route('store.product.find')}}" method="GET" enctype="multipart/form-data">
                        <div class="form-group {{$errors->has('query')? 'has-error': ''}}">
                        <input name="query" class="input search-input" type="text" value="@if(Request::url()==route('store.product.find')){{$query}}@endif" placeholder="أدخل كلمة البحث">
                        </div>
                        <select name="category" class="input search-categories">
                            <option value="0" @if(Request::url()==route('store.product.find')  && $category_id ==0){{'selected'}}@endif>كل الأقسام</option>
                            @foreach(get_all_categories() as $index => $category)
                        <option value="{{$category->id}}" @if(Request::url()==route('store.product.find')  && $category_id ==$category->id){{'selected'}}@endif>{{$category->name}}</option>
                            @endforeach
                            {{-- <option value="1">التصنيف 01</option>
                            <option value="1">التصنيف 02</option> --}}
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <!--show this in col-lg -->
            {{-- <div class="hidden-xs hidden-sm pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                        </div>
                        <ul class="custom-menu">
                            @if(Auth::guard('consumer')->check())
                            <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-user-o"></i> حسابي</a></li>
                            <li><a href="{{route('consumer.wish_list')}}"><i class="fa fa-heart-o"></i> قائمة امنياتي</a></li>
                            <li><a href="{{route('consumer.compar_list')}}"><i class="fa fa-exchange"></i> مقارنة</a></li>
                            @if(session()->has('cart'))
                            <li><a href="{{route('checkout')}}"><i class="fa fa-check"></i> الدفع</a></li>                                                        
                            @endif
                            <li><a href="{{route('consumer.logout')}}"><i class="fa fa-sign-out"></i></i> تسجيل الخروج</a></li>                                 
                            @else 
                            <li><a href="{{route('consumer.login')}}"><i class="fa fa-sign-in"></i> تسجيل الدخول</a></li>
                            <li><a href="{{route('consumer.register')}}"><i class="fa fa-user-plus"></i> إنشاء حساب</a></li>
                            @endif
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li id="cart_section1" class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{session()->has('cart')?session()->get('cart')->totalQty:'0'}}</span>
                            </div>
                            <strong class="text-uppercase">السلة:</strong>
                            <br>
                            <span>{{session()->has('cart')?session()->get('cart')->totalPrice:'0.00'}} دج</span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    @if(session()->has('cart'))
                                    @foreach(session()->get('cart')->items as $item)
                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">{{$item['price']}} دج<span class="qty"> الكمية:{{$item['qty']}}</span></h3>
                                            <h2 class="product-name"><a href="{{url('product/'.$item['id'])}}">{{$item['title']}}</a></h2>
                                        </div>
                                        <a href="{{route('cart.remove',$item['id'])}}"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                    </div>
                                    @endforeach
                                    @else 
                                   <div class="product product-widget">
                                   السلة فارغة     
                                    </div>              
                                    @endif                                    
                                </div>
                                @if(session()->has('cart'))
                                <div class="shopping-cart-btns">
                                    <a href="{{route('cart.show')}}"><button class="main-btn">عرض محتوى السلة</button></a>
                                    <a href="{{route('checkout')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"></i> الدفع</button></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div> --}}
            <!--end show this in col-lg-->
            <!--show this in col-xs -->
            <div class="container">
                <div class="row">
                    {{-- <div class="text-center col-xs-12 col-sm-12 xs-header"> --}}
                    <div class="text-center">
                        <a href="{{url('/')}}">
                        <img src="{{url('store/img/logo.png')}}">
                        </a>
                    </div>
                    {{-- <div class="col-sm-6 xs-header">
                        <img src="{{url('store/img/drapo.png')}}" height="20">
                    </div>
                    <div class="col-sm-3 xs-header">
                        <img src="{{url('store/img/drapo.png')}}" height="20">
                    </div> --}}
                </div>                
            </div>
            <nav class="hidden-lg hidden-md navbar navbar-default">                
                <div class="container">                    
                    <div class="pull-right">
                        <ul class="header-btns my-xs-nav-ul">
                            <!--search btn-->
                            <li class="xs-search-btn">
                                <button class="header-btns-icon"><i class="fa fa-search"></i></button>
                            </li>
                            <!-- Account -->
                            
                            <!-- /Account -->
        
                            <!-- Cart -->
                            <li id="xs_cart_section" class="header-cart dropdown default-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="header-btns-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="qty">{{session()->has('cart')?session()->get('cart')->totalQty:'0'}}</span>
                                    </div>
                                    <strong class="text-uppercase">السلة:</strong>
                                    <br>
                                    <span>{{session()->has('cart')?session()->get('cart')->totalPrice:'0.00'}} دج</span>
                                </a>
                                <div class="custom-menu">
                                    <div id="shopping-cart">
                                        <div class="shopping-cart-list">
                                            @if(session()->has('cart'))
                                            @foreach(session()->get('cart')->items as $item)
                                            
                                            <div class="product product-widget">
                                                <div class="product-thumb">
                                                    <img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-price">{{$item['price']}} دج<span class="qty"> الكمية:{{$item['qty']}}</span></h3>
                                                    <h2 class="product-name"><a href="{{url('product/'.get_product_data_from_id($item['id'])->slug)}}">{{$item['title']}}</a></h2>
                                                </div>
                                                <a href="{{route('cart.remove',$item['id'])}}"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                            @endforeach
                                            @else 
                                           <div class="product product-widget text-center">
                                                  السلة فارغة
                                            </div>              
                                            @endif
                                            
                                        </div>
                                        @if(session()->has('cart'))
                                        <div class="shopping-cart-btns">
                                            <a href="{{route('cart.show')}}"><button class="main-btn">عرض محتوى السلة</button></a>
                                            <a href="{{route('checkout')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"></i> أطلب الآن</button></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <!-- /Cart -->
        
                            <!-- Mobile nav toggle-->
                            <li class="nav-toggle">
                                <button class="menu-btn nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                            </li>
                            <!-- / Mobile nav toggle -->
                        </ul>
                    </div>
                    <!---->
                    <div id="xs-search-form" class="container" style="display: none">
                    <div class="row text-center">
                    <!-- Search -->                    
                <div class="col-12 header-search">
                    <form action="{{route('store.product.find')}}" method="GET" enctype="multipart/form-data">
                        <div class="form-group {{$errors->has('query')? 'has-error': ''}}">
                        <input name="query" class="input search-input" type="text" value="@if(Request::url()==route('store.product.find')){{$query}}@endif" placeholder="أدخل كلمة البحث">
                        </div>
                        <select name="category" class="input search-categories">
                            <option value="0" @if(Request::url()==route('store.product.find')  && $category_id ==1){{'selected'}}@endif>كل الأقسام</option>
                            @foreach(get_all_categories() as $index => $category)
                        <option value="{{$category->id}}" @if(Request::url()==route('store.product.find')  && $category_id ==$category->id){{'selected'}}@endif>{{$category->name}}</option>
                            @endforeach                            
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
                    </div>
                </div>
                    <!---->
                </div>
              </nav>
            <!--end show this in col-xs-->
        </div>
        <!--/container in sm-->
        <!--/ header -->        
    </div>
    <!-- container -->
</header>