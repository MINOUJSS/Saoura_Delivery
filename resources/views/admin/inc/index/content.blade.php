<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الرئيسية
        <small>الشاشة الرئيسية</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        {{-- <li class="active">الرئيسية</li> --}}
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{global_product_in_the_store()}}</h3>
              <p>أنواع المنتجات الموجودة</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="{{route('admin.products')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{global_product_qty_in_the_store()}}</h3>
              <p>عدد المنتجات الموجودة بالحبة</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="{{route('admin.products')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>الطلبات</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="#" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>{{global_Purchasing_price()}} دج</h4>
              <p>ثمن الشراء الإجمالي</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>{{global_selling_price()}} دج</h4>              
              <p>ثمن البيع الإجمالي</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>{{global_selling_price() - global_Purchasing_price()}} دج</h4>              
              <p>الأرباح المتوقعة</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->