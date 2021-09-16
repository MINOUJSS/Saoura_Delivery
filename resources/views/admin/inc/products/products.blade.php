<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المنتجات
        <small>كل المنتجات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">المنتجات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-gift"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">المنتجات بالمتجر</span>
              <span class="info-box-number">{{global_product_in_the_store()}} نوع</span>
              <span class="info-box-number">{{global_product_qty_in_the_store()}} حبة</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">ثمن الشراء الإجمالي</span>
              <span class="info-box-number">{{global_Purchasing_price()}} دج</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">ثمن البيع الإجمالي</span>
              <span class="info-box-number">{{global_selling_price()}} دج</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">الأرباح المتوقعة</span>
              <span class="info-box-number">{{global_selling_price() - global_Purchasing_price()}} دج</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>
      </div>

<div class="row">
  <div class="col-lg-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">جدول المنتجات</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="بحث">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding witespace">
            <table class="table table-hover">
              <tbody><tr>
                <th>رقم المنتج</th>
                <th>العمليات</th>
                <th>صورة المنتج</th>
                <th>إسم المنتج</th>
                <th>ملكية المنتج</th>
                <th>حالة المنتج</th>
                {{-- <th>العلامة التجارية</th>
                <th>وصف موجز</th>
                <th>وصف كامل</th> --}}
                <th>تكلفة المنتج</th>
                <th>سعر البيع</th>
                <th>هامش الربح</th>
                <th>المبيعات في هذا الشهر</th>
                <th>إجمالي المبيعات</th>
                <th>التقييم</th>
                <th>الكمية</th>
                <th>الصنف</th>
                {{-- <th>تحت الصنف</th>
                <th>تحت تحت الصنف</th>
                <th>المورد</th>
                <th>صاحب السلعة</th> --}}
                
              </tr>
              @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>
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
                </td>
                <td><img src="{{url('admin-css/uploads/images/products/'.$product->image)}}" height="50" width="50"></td>
                <td><a href="{{route('admin.product.details',$product->id)}}">{{$product->name}}</a></td>
                <td>{!!product_dropsheping_statu($product->dropsheping)!!}</td>
                <td><a href="{{route('admin.product.change_statu',$product->id)}}">{!!product_status($product->statu)!!}</a></td>
                {{-- @if($product->brand!=null)
                <td>{{$product->brand->name}}</td>
                @else
                <td>بدون علامة تجارية</td>
                @endif
                <td>{!!$product->short_description!!}</td>
                <td>{!!$product->long_description!!}</td> --}}
                <td class="text-danger">{{get_product_charge($product->id) }}</td>
                <td class="text-success">{{price_with_discount($product->id) }}</td>
                <td class="text-info">
                  @if(has_discount($product->id))
                  {{get_product_binifis_with_discount($product->id)}}
                  @else
                  {{get_product_binifis($product->id)}}
                  @endif
                  {{-- {{$product->selling_price - $product->Purchasing_price }} --}}
                </td>
                <td>{{get_completed_sales_in_this_month($product->id)}}</td>                
                <td>{{$product->sales->count()}}</td>
                <td>{{get_product_reating_from_id($product->id)}}</td>
                <td>{{$product->qty}}</td>
                <td>{!!globale_product_categories($product->id)!!}</td>
                {{-- @if($product->category!=null)
                <td>{{$product->category->name}}</td>
                @else 
                <td>بدون تصنيف</td>
                @endif --}}


                {{-- @if($product->category->id!=null)
                <td>{{$product->sub_category->name}}</td>
                @else 
                <td>بدون تحت التصنيف</td>
                @endif
                @if($product->sub_sub_category!=null)
                <td>{{$product->sub_sub_category->name}}</td>
                @else                                 
                <td>بدون تحت تحت التصنيف</td>
                @endif 
                @if($product->supplier!=null)
                <td>{{$product->supplier->name}}</td>
                @else 
                <td>بدون مزود</td>
                @endif
                <td>{{$product->user->name}}</td> --}}
                
              </tr> 
              @endforeach             
            </tbody></table>            
          </div><!-- /.box-body -->
          {{$products->links()}}
        </div><!-- /.box -->
  </div>
</div>
      <!--End Page Content Here-->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->