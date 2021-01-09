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
                <th>إسم المنتج</th>
                <th>العلامة التجارية</th>
                <th>وصف موجز</th>
                <th>وصف كامل</th>
                <th>سعر الشراء</th>
                <th>سعر البيع</th>
                <th>هامش الربح</th>
                <th>المبيعات في هذا الشهر</th>
                <th>إجمالي المبيعات</th>
                <th>التقييم</th>
                <th>الكمية</th>
                <th>الصنف</th>
                <th>تحت الصنف</th>
                <th>تحت تحت الصنف</th>
                <th>المورد</th>
                <th>صاحب السلعة</th>
                <th>العمليات</th>
              </tr>
              @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                @if($product->brand_id!=0)
                <td>{{$product->brand->name}}</td>
                @else
                <td>بدون علامة تجارية</td>
                @endif
                <td>{{$product->short_description}}</td>
                <td>{{$product->long_description}}</td>
                <td class="text-danger">{{$product->Purchasing_price }}</td>
                <td class="text-success">{{$product->selling_price }}</td>
                <td class="text-info">{{$product->selling_price - $product->Purchasing_price }}</td>
                <td>{{get_completed_sales_in_this_month($product->id)}}</td>                
                <td>{{$product->sales->count()}}</td>
                <td>{{get_product_reating_from_id($product->id)}}</td>
                <td>{{$product->qty}}</td>
                @if($product->category!=null)
                <td>{{$product->category->name}}</td>
                @else 
                <td>بدون تصنيف</td>
                @endif
                @if($product->category->id!=null)
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
                <td>{{$product->user->name}}</td>
                <td style="width : 100px;"><a href="{{url('admin/product').'/'.$product->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_product" title="{{$product->name}}" url="{{url('admin/product').'/'.$product->id.'/delete'}}" class="fa fa-trash text-danger cursor-pointer"></i></td>
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