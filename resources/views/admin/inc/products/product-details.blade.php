@extends('admin.layouts.app')
@section('header')
@include('admin.inc.header.header')
@endsection
@section('side-bar')
@include('admin.inc.side-bar.side-bar')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تفاصيل المنتج
        <small>كل تفاصيل المنتج</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تفاصيل المنتج</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> تفاصيل المنتج</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-lg-6 col-md-6">
                <!--start carousel-->
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title">صور المنتج</h3>
                    {{-- {{get_all_product_images($product->id)}} --}}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        @foreach(get_all_product_images($product->id) as $key=>$value)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$key}}"></li>
                        @endforeach
                        </ol>
                        <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{url('admin-css/uploads/images/products/'.$product->image)}}" alt="First slide" heigth="500" width="900">
                            <div class="carousel-caption" style="color:#000000">
                            {{$product->name}}
                            </div>
                        </div>
                        @foreach(get_all_product_images($product->id) as $key=>$value)
                        <div class="item">
                        <img src="{{$value}}" alt="First slide" heigth="500" width="900">
                            <div class="carousel-caption" style="color:#000000">
                            {{$product->name}}
                            </div>
                        </div>
                        @endforeach
                        
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                    </div><!-- /.box-body -->
                </div>
                <!--end carousel-->
            </div>

            <div class="col-lg-6 col-md-6">
              <!--start operations-->
              <div class="box box-default collapsed-box" style="margin-top:10px;">
                <div class="box-header with-border">
                  <h3 class="box-title">العمليات</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  <!---->
                  <a href="{{url('admin/product/'.$product->id.'/add-images')}}"><button class="btn btn-block btn-warning btn-xs"><i class="fa fa-hand-scissors-o"> إضافة صورة</i></button></a>
                  <a href="{{url('admin/product/'.$product->id.'/add-color')}}" ><button class="btn btn-block btn-info btn-xs"><i class="fa fa-eyedropper"> إضافة لون</i></button></a>
                  <a href="{{url('admin/product/'.$product->id.'/add-size')}}"><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-hand-scissors-o"> إضافة مقاس</i></button></a>
                  @if(!has_discount($product->id))
                  <a href="{{url('admin/product/'.$product->id.'/discount/create')}}"><button class="btn btn-block btn-danger btn-xs"><i class="fa fa-percent"> إضافة تخفيض</i></button></a>
                  @else
                  <button id="delete_discount" title="{{$product->discount->descount}}" url="{{url('admin/product/discount').'/'.$product->discount->id.'/delete'}}" class="btn btn-block btn-danger btn-xs"><i class="fa fa-trash-o"> حذف تخفيض</i></button>
                  {{-- <i id="delete_descount" title="{{$product->discount->descount}}" url="{{url('admin/product/discount').'/'.$product->discount->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i> --}}
                  {{-- <a href="{{url('admin/product/discount/'.$product->discount->id.'/delete')}}"><button class="btn btn-block btn-danger btn-xs"><i class="fa fa-trash-o"> حذف تخفيض</i></button></a> --}}
                  @endif
                  @if (product_has_seo($product->id))
                  <a href="{{route('admin.edit.product.seo',$product->id)}}"><button class="btn btn-block btn-success btn-xs"><i class="fa fa-search"> تعديل سيو</i></button></a>        
                  @else
                  <a href="{{route('admin.create.product.seo',$product->id)}}"><button class="btn btn-block btn-info btn-xs"><i class="fa fa-search"> إضافة سيو</i></button></a>    
                  @endif
                  <a href="{{url('admin/product').'/'.$product->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                  <i id="delete_product" title="{{$product->name}}" url="{{url('admin/product').'/'.$product->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
                  <!---->
                </div><!-- /.box-body -->                  
              </div><!-- /.box -->
              <!--end operations-->
                <div class="product-body">
                    <div class="product-label">
                        @if(is_new_product($product->created_at))
                        <span>جديد</span>
                        @endif
                        @if(has_discount($product->id))
                        {{-- <span class="sale">- %{{$product->discount->discount}}</span> --}}
                        <span class="sale">- %{{get_product_discount($product->id)}}</span>            
                        @endif
                    </div>
                    <h2 class="product-name">{{$product->name}}</h2>
                    {{-- <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->selling_price,get_product_discount($product->id))}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3> --}}
                    <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->id)}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3>
                    <div>
                        {{-- <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div> --}}
                        <div id="product_ratings" data-rating="{{get_product_reating_from_id($product->id)}}"></div>
                        <div class='product-star starrr'></div>
            
                        <a href="#tab2">{{$reviews->count()}} مراجعات / إضافة مراجعة</a>
                    </div>
                    <p><strong>التوفر:</strong> {{product_availability($product->id)}}</p>
                    <p><strong>العلامة التجارية:</strong> {{$product->brand->name}}</p>
                    <p>{{$product->short_description}}</p>
                    <div class="product-options"> 
                        @if(count($product->sizes)>0)           
                        <ul class="list-unstyled">
                            <li><span class="text-uppercase">المقاس:</span></li>
                            @foreach($product->sizes as $size)                
                            <li style="display: inline-block;border:1px solid #000;">{{$size->qty.' '.$size->size->name}}</li>
                            {{-- <li><a href="#">XL</a></li>
                            <li><a href="#">SL</a></li> --}}
                            @endforeach
                        </ul>           
                        @endif        
                        @if(count($product->colors)>0) 
                        <ul class="list-unstyled">                
                            <li><span class="text-uppercase">اللون:</span></li>
                            @foreach($product->colors as $color)
                            <li class="text-center" style="background-color:{{$color->color->code}};display: inline-block; margin:2px;border:1px solid #000;height:20px;width:20px;">{{$color->qty}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
            </div>

    <!-- reviews -->
                <div class="box box-default collapsed-box" style="margin-top:10px;">
                  <div class="box-header with-border">
                    <h3 class="box-title">التقييمات</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body" style="display: none;">
                    @if($reviews->count()>0)
                    <div class="post clearfix">
                        @foreach($reviews as $review)
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{url('admin-css/dist/img/avatar5.png')}}" alt="user image">
                          <span class="username">
                            <a href="#">{{$review->name}}</a>
                            <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                          </span>
                          <span class="description">قام بتقييم المنتج - {{$review->created_at->diffForHumans()}}</span>
                        </div><!-- /.user-block -->
                        <p>
                          {{$review->review}}
                        </p>                        
                      </div>
                      <div>
                          <a href="{{route('admin.reating.delete',$review->id)}}"><i class="fa fa-trash" style="color:#f00"></i></a>
                      </div>
                      @endforeach
                      @else 
                      <p>لا يوجد تقييمات لهذا المنتج</p>
                      @endif                      
                  </div><!-- /.box-body -->                  
                  {{$reviews->links()}}
                </div><!-- /.box -->


          </div><!-- /.row -->
          <div class="row">
              <div class="col-lg-12">
                <!--start product images-->
              @if(count(get_all_product_images($product->id)) >0)
              <div class="box box-solid">              
                <h3 class="timeline-header">صور أخرى للمنتج</h3>
                <div class="timeline-body">                  
                  @foreach(get_all_product_images($product->id) as $image)
                  <img src="{{$image}}" height="100" width="100" alt="{{$product->name}}" class="margin">
                  @endforeach                  
                </div>
              </div>
              @endif
              <!--end product images--> 
              <!--start daitels-->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">تفاصيل المنتج</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <label>رابط  المنتج:</label>
                <p class="text-muted well well-sm no-shadow"> {{url('/product').'/'.$product->slug}}</p>
                    <label>العلامة التجارية:</label>
                <p class="text-muted well well-sm no-shadow"> {{$product->brand->name}}</p>
                <label>وصف مختصر للمنتج:</label>
                  <p class="text-muted well well-sm no-shadow"> {!!$product->short_description!!}</p>
                  <label>وصف كامل للمنتج:</label>
                  <div class="text-muted well well-sm no-shadow">
                  <p> {!!$product->long_description!!}</p>
                  </div>
                  <label>ثمن الشراء:</label>
                  <p class="text-warning well well-sm no-shadow">{{$product->Purchasing_price}}</p>
                  <label>ثمن التوصيل للمخازن:</label>
                  <p class="text-warning well well-sm no-shadow">{{$product->to_magazin_price}}</p>
                  <label>ثمن التوصيل للزبون:</label>
                  <p class="text-warning well well-sm no-shadow">{{$product->to_consumer_price}}</p>
                  <label>تكلفة التغليف:</label>
                  <p class="text-warning well well-sm no-shadow">{{$product->ombalage_price}}</p>
                  <label>تكلفة الإعلان:</label>
                  <p class="text-warning well well-sm no-shadow">{{$product->adds_price}}</p>
                  <label>التكلفة الإجمالية للمنتج:</label>
                  <p class="text-danger well well-sm no-shadow">{{$total=$product->Purchasing_price+$product->to_magazin_price+$product->to_consumer_price+$product->ombalage_price+$product->adds_price}}</p>
                  <label>ثمن البيع:</label>
                  <p class="text-success well well-sm no-shadow">{{$product->selling_price}}</p>                  
                  <label>الربح المتوقع:</label>
                  <p class="text-info well well-sm no-shadow">{{$product->selling_price - $total}}</p>
                  <label>الكمية المتوفرة في المخزن:</label>
                  <p class="text-muted well well-sm no-shadow">{{$product->qty}}</p>
                  <label>الصنف:</label>
                  <p class="text-muted well well-sm no-shadow">{!!globale_product_categories($product->id)!!}</p>
                  {{-- <p class="text-muted well well-sm no-shadow">{{$product->category->name}}</p>
                  <label>تحت الصنف:</label>
                  <p class="text-muted well well-sm no-shadow">{{$product->sub_category->name}}</p>
                  <label>تحت تحت الصنف:</label>                  
                  <p class="text-muted well well-sm no-shadow">{{$product->sub_sub_category->name}}</p> --}}
                  <label>المورد:</label>
                  <p class="text-muted well well-sm no-shadow">{{$product->supplier->name}} <br><br><i class="fa fa-phone" style="color:#f00"></i><a href="tel:{{$product->supplier->mobile}}">{{$product->supplier->mobile}}</a> <br><br><i class="fa fa-whatsapp" style="color:#0f0"></i><a href="https://wa.me/{{$product->supplier->mobile}}">{{$product->supplier->mobile}}</a></p>
                  <label>صاحب السلعة:</label>
                  <p class="text-muted well well-sm no-shadow">{{$product->user->name}}</p>                  
                </div><!-- /.box-body -->
                {{-- <div class="box-footer">
                   add some links 
                </div><!-- /.box-footer--> --}}
              </div>
              <!--end daitels-->
              </div>          
          </div>
        </div><!-- /.box-body -->
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@endsection
@section('main-footer')
@include('admin.inc.main-footer.main-footer')
@endsection
@section('control-sidebar')
@include('admin.inc.control-sidebar.control-sidebar')
@endsection