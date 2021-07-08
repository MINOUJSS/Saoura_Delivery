<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تعديل مقاس للمنتج
        <small>تعديل مقاس للمنتج رقم:{{$product->id}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.products')}}"><i class="fa fa-gift"></i> المنتجات</a></li>
        <li class="active">تعديل مقاس للمنتج</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <!--producte detail-->
        <div class="col-lg-6">
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
                  <p><label>العلامة التجارية:</label>{{$product->brand->name}}</p>
                  <p><label>وصف مختصر للمنتج:</label>{{$product->short_description}}</p>
                  <p><label>وصف كامل للمنتج:</label>{{$product->long_description}}</p>
                  <p class="text-warning"><label>ثمن الشراء:</label>{{$product->Purchasing_price}}</p>
                  <p class="text-warning"><label>ثمن التوصيل للمخازن:</label>{{$product->to_magazin_price}}</p>
                  <p class="text-warning"><label>ثمن التوصيل للزبون:</label>{{$product->to_consumer_price}}</p>
                  <p class="text-warning"><label>تكلفة التغليف:</label>{{$product->ombalage_price}}</p>
                  <p class="text-warning"><label>تكلفة الإعلان:</label>{{$product->adds_price}}</p>
                  <p class="text-danger"><label>التكلفة الإجمالية للمنتج:</label>{{$total=$product->Purchasing_price+$product->to_magazin_price+$product->to_consumer_price+$product->ombalage_price+$product->adds_price}}</p>
                  <p class="text-success"><label>ثمن البيع:</label>{{$product->selling_price}}</p>                  
                  <p class="text-info"><label>الربح المتوقع:</label>{{$product->selling_price - $total}}</p>
                  <p><label>الكمية المتوفرة في المخزن:</label>{{$product->qty}}</p>
                  <td><label>الصنف:</label>{!!globale_product_categories($product->id)!!}</td>
                  {{-- <p><label>الصنف:</label>{{$product->category->name}}</p>
                  <p><label>تحت الصنف:</label>{{$product->sub_category->name}}</p>
                  <p><label>تحت تحت الصنف:</label>{{$product->sub_sub_category->name}}</p> --}}
                  <p><label>المورد:</label>{{$product->supplier->name}}</p>
                  <p><label>صاحب السلعة:</label>{{$product->user->name}}</p>                  
                </div><!-- /.box-body -->
                <div class="box-footer">
                  {{-- add some links --}}
                </div><!-- /.box-footer-->
              </div>
              <!--end daitels-->
        </div>
                <!--start add color form-->
                <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">إضافة لون</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.edit-size-to-product.update')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="product_size_id" value="{{$prod_size->id}}">
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="product_id" value="{{$product->id}}">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="size_id">المقاسات</label>
                              <select name="size_id" class="form-control">
                                <option value="0">إختر مقاس للمنتج</option>
                                @foreach($sizes as $size)
                                <option value="{{$size->id}}" @if(old('size_id')==$size->name || $prod_size->size->name == $size->name){{'selected'}}@endif>{{$size->name }} | {{ $size->size}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group {{$errors->has('qty')? 'has-error':''}}">
                              <label for="qty">عدد المنتجات للمقاس المختار</label>
                              <input type="number" class="form-control" name="qty" id="qty" value="@if(old('qty')){{old('qty')}}@else{{$prod_size->qty}}@endif">                              
                              @if($errors->has('qty'))
                              <span class="help-block">
                              {{ $errors->first('qty')}}
                              </span>
                              @endif
                            </div>                                                        
                          </div><!-- /.box-body -->
        
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                          </div>
                        </form>
                      </div>
                      <!--end add color form-->
                      <!--start product color table-->
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">جدول مقاسات المنتج</h3>
                          <div class="box-tools">
                          </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tbody><tr>
                              <th>#</th>
                              <th>إسم المقاس</th>
                              <th>المقاس</th>
                              <th>عدد المنتجات بهذا المقاس</th>                              
                              <th>العمليات</th>
                            </tr>
                            @foreach($product_sizes as $index=>$prod_size)
                            <tr>
                              <td>{{$index +1}}</td>
                              <td>{{$prod_size->size->name}}</td>
                              <td>{{$prod_size->size->size}}</td>
                              <td>{{$prod_size->qty}}</td>
                              <td>
                                @if(count($product_sizes) > 1)
                                <a href="{{url('admin/product').'/'.$prod_size->id.'/edit-size'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                                <i id="delete_product_size" title="{{$prod_size->size->name}}" url="{{url('admin/product').'/'.$prod_size->id.'/delete-size'}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody></table>
                        </div><!-- /.box-body -->
                      </div>
                      <!--end product color table-->
                </div>
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->