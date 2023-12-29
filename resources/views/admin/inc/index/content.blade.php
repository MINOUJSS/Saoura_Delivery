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

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{get_pending_orders()}}</h3>
              <p>الطلبات قيد الإنتظار</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{get_confirmed_orders()}}</h3>
              <p>الطلبات المؤكدة</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{get_delivered_orders()}}</h3>
              <p>الطلبات المرسلة</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{get_completed_orders()}}</h3>
              <p>الطلبات المكتملة</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{get_canceled_orders()}}</h3>
              <p>الطلبات الملغية</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{get_returned_orders()}}</h3>
              <p>الطلبات المرجعة</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{get_all_orders()}}</h3>
              <p>مجموع الطلبات</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{route('admin.orders')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!---->
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">أون لاين</span>
              <span class="info-box-number">                
                0
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">اليوم</span>
              <span class="info-box-number">410</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">أمس</span>
            <span class="info-box-number">410</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">آخر أسبوع</span>
            <span class="info-box-number">410</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">آخر شهر</span>
            <span class="info-box-number">410</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">آخر سنة</span>
            <span class="info-box-number">410</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">إجمالي الزوار</span>
            <span class="info-box-number">{{get_all_visitors_count()}}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div>

      </div>
      <!---->

      <div class="row">

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>{{global_product_in_the_store()}}</h4>
              <p>أنواع المنتجات الموجودة</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="{{route('admin.products')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>{{global_product_qty_in_the_store()}}</h4>
              <p>عدد المنتجات الموجودة بالحبة</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="{{route('admin.products')}}" class="small-box-footer">معلومات أكثر <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-xs-12">
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

        <div class="col-lg-3 col-sm-12 col-xs-12">
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

        <div class="col-lg-3 col-sm-12 col-xs-12">
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