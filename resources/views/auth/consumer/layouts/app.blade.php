<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>الساورة دليفري</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="{{url('store')}}/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="{{url('store')}}/css/rtl_bootstrap.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{url('store')}}/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="{{url('store')}}/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{url('store')}}/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{url('store')}}/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cairo:600&display=swap" rel="stylesheet">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{url('store')}}/css/style.css" />
	<link type="text/css" rel="stylesheet" href="{{url('store')}}/css/my_style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
    {{-- @yield('header') --}}
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
                            </ul>
                        </li>
                        <!-- /Account -->
    
                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">3</span>
                                </div>
                                <strong class="text-uppercase">عربة التسوق:</strong>
                                <br>
                                <span>35.20 دج</span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{{url('store')}}/img/thumb-product01.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price"> 32.50 دج<span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">اسم المنتج هنا</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{{url('store')}}/img/thumb-product01.jpg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price"> 32.50 دج<span class="qty">x3</span></h3>
                                                <h2 class="product-name"><a href="#">اسم المنتج هنا</a></h2>
                                            </div>
                                            <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <button class="main-btn">عرض عربة التسوق</button>
                                        <button class="primary-btn">الدفع <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
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
	<!-- /HEADER -->

	<!-- NAVIGATION -->
    {{-- @yield('navigation') --}}
    <div id="navigation">    
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
            <div class="category-nav {{is_home()}}">
                    <span class="category-header">الأصناف <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @foreach(get_all_categories() as $category)
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$category->name}} @if(has_sub_categories($category->id))<i class="fa fa-angle-left"></i>@endif</a>
                            @if(has_sub_categories($category->id))
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-12">
                                    <a href="#"><h3>{{$category->name}}</h3></a>
                                        <hr>
                                    </div>
                                    @foreach(get_sub_gategories($category->id) as $sub_category)
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">{{$sub_category->name}}</h3></li>
                                                @if(has_sub_sub_categories($sub_category->id))
                                                @foreach(get_sub_sub_categories($sub_category->id) as $sub_sub_category)
                                            <li><a href="#">{{$sub_sub_category->name}}</a></li>
                                                @endforeach
                                            {{-- <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li> --}}
                                            @endif
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    @endforeach
                                    {{-- <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner banner-1" href="#">
                                            @if($category->image=="/")
                                            <img src="{{url('store')}}/img/banner05.jpg" alt="">
                                            @else 
                                            <img src="{{url('admin-css/uploads/images/categories/'.$category->image)}}" height="180" width="716" alt="">
                                            @endif
                                            <div class="banner-caption text-center">
                                                <h2 class="white-color">NEW COLLECTION</h2>
                                                <h3 class="white-color font-weak">HOT DEAL</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div> 
                            @endif
                        </li>
                        @endforeach
                    {{--<li><a href="#">Men’s Clothing</a></li>
                         <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Phones & Accessories <i class="fa fa-angle-left"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 hidden-sm hidden-xs">
                                        <a class="banner banner-2" href="#">
                                            <img src="{{url('store')}}/img/banner04.jpg" alt="">
                                            <div class="banner-caption">
                                                <h3 class="white-color">NEW<br>COLLECTION</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Computer & Office</a></li>
                        <li><a href="#">Consumer Electronics</a></li>
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Jewelry & Watches <i class="fa fa-angle-left"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Bags & Shoes</a></li> --}}
                        <li><a href="#">رؤية الكل</a></li>
                    </ul>
                </div>
                <!-- /category nav -->
    
                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                    <li><a href="{{url('/')}}">الرئيسية</a></li>                    
                        {{-- <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner banner-1" href="#">
                                            <img src="{{url('store')}}/img/banner05.jpg" alt="">
                                            <div class="banner-caption text-center">
                                                <h2 class="white-color">NEW COLLECTION</h2>
                                                <h3 class="white-color font-weak">HOT DEAL</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="{{url('store')}}/img/banner06.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Women’s</h3>
                                                </div>
                                            </a>
                                            <hr>
                                        </div>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="{{url('store')}}/img/banner07.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Men’s</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="{{url('store')}}/img/banner08.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Accessories</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="{{url('store')}}/img/banner09.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Bags</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Sales</a></li> --}}
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">الصفحات <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <li><a href="index.html">الرئيسية</a></li>
                                <li><a href="{{route('products')}}">المنتجات</a></li>
                                <li><a href="{{route('product-page')}}">تفاصيل المنتج</a></li>
                                <li><a href="{{route('checkout')}}">الدفع</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->
    
   

@yield('content')
</div>
<!--end section-->
	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="{{url('store')}}/img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{url('store')}}/js/jquery.min.js"></script>
	<script src="{{url('store')}}/js/bootstrap.min.js"></script>
	<script src="{{url('store')}}/js/slick.min.js"></script>
	<script src="{{url('store')}}/js/nouislider.min.js"></script>
	<script src="{{url('store')}}/js/jquery.zoom.min.js"></script>
	<script src="{{url('store')}}/js/main.js"></script>

</body>

</html>