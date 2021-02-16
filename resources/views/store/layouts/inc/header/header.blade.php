<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>مرحباً بكم في ساورة دليفري!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="#">المتجر</a></li>
                    <li><a href="#">النشرة الإخبارية</a></li>
                    <li><a href="#">أسئلة شائعة</a></li>
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
                            {{-- <li><a href="#">EUR (€)</a></li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="#">
                        <img src="{{url('store')}}/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="أدخل كلمتك الرئيسية">
                        <select class="input search-categories">
                            <option value="0">كل التصنيفات</option>
                            @foreach(get_all_categories() as $index => $category)
                        <option value="{{$index + 1 }}">{{$category->name}}</option>
                            @endforeach
                            {{-- <option value="1">التصنيف 01</option>
                            <option value="1">التصنيف 02</option> --}}
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">حسابي <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="#" class="text-uppercase">دخول</a> / <a href="#" class="text-uppercase">انضم</a>
                        <ul class="custom-menu">
                            <li><a href="#"><i class="fa fa-user-o"></i> حسابي</a></li>
                            <li><a href="#"><i class="fa fa-heart-o"></i> قائمة امنياتي</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> مقارنة</a></li>
                            <li><a href="#"><i class="fa fa-check"></i> الدفع</a></li>                            
                            <li><a href="#"><i class="fa fa-unlock-alt"></i> تسجيل الدخول</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i> إنشاء حساب</a></li>
                            <li><i class="fa fa-user-plus"></i><a href="{{route('consumer.logout')}}"></i> تسجيل الخروج</a></li> 
                                {{--
                                     onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                
                                    <form id="logout-form" action="{{ route('consumer.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>                            --}}
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{session()->has('cart')?session()->get('cart')->totalQty:'0'}}</span>
                            </div>
                            <strong class="text-uppercase">عربة التسوق:</strong>
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
                                    <a href="{{route('cart.show')}}"><button class="main-btn">عرض عربة التسوق</button></a>
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
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>