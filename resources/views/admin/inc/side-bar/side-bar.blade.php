<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      @include('admin.inc.side-bar.inc.side-bar-user-panel')

      <!-- search form (Optional) -->
      @include('admin.inc.side-bar.inc.serch-form')
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">محتوى القائمة</li>
        <!-- Optionally, you can add icons to the links -->
      <li class="{{active_dashboard_link()}}"><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> <span>الرئيسية</span></a></li>      
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>المستخدمين</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">كل المستخدمين</a></li>
            <li><a href="#">إضافة مستخدم</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-user-secret"></i> <span>الموردين</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
          <li><a href="#">كل الموردين</a></li>
          <li><a href="#">إضافة مورد</a></li>
          </ul>
        </li>
      <li class="treeview {{active_categories_links_group()}}">
        <a href="{{route('admin.categories')}}"><i class="fa fa-tag"></i> <span>الأصناف</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
          <li class="{{active_categories_link()}}"><a href="{{route('admin.categories')}}">كل الأصناف</a></li>
          <li class="{{active_create_categories_link()}}"><a href="{{route('admin.create.categories')}}">إضافة صنف</a></li>
          <li class="{{active_create_sub_categories_link()}}"><a href="{{route('admin.create.sub_categories')}}">إضافة صنف تحت الصنف</a></li>
          <li class="{{active_create_sub_sub_categories_link()}}"><a href="{{route('admin.create.sub_sub_categories')}}">إضافة صنف تحت تحت الصنف</a></li>
          </ul>
        </li>
        <li class="treeview {{active_brands_links_group()}}">
          <a href="{{route('admin.brands')}}"><i class="fa fa-gift"></i> <span>العلامات التجارية</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li class="{{active_brands_link()}}"><a href="{{route('admin.brands')}}">كل العلامات التجارية</a></li>
            <li class="{{active_create_brand_link()}}"><a href="{{route('admin.create.brand')}}">إضافة علامة تجارية</a></li>
          </ul>
        </li>
        <li class="treeview {{active_products_links_group()}}">
          <a href="{{route('admin.products')}}"><i class="fa fa-gift"></i> <span>المنتجات</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li class="{{active_products_link()}}"><a href="{{route('admin.products')}}">كل المنتجات</a></li>
            <li class="{{active_create_product_link()}}"><a href="{{route('admin.create.product')}}">إضافة منتج</a></li>
          </ul>
        </li>
        <li class=""><a href="#"><i class="fa fa-chain"></i> <span>ربط المنتجات ببعضها</span></a></li>      
      <li class="treeview {{active_deals_links_group()}}">
          <a href="#"><i class="fa fa-bullhorn"></i> <span>العروض</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
          <li class="{{active_deals_link()}}"><a href="{{route('admin.deals')}}">كل العروض</a></li>
          <li class="{{active_create_deal_link()}}"><a href="{{route('admin.add.deal')}}">إضافة عرض</a></li>
          </ul>
        </li>
        <li class=""><a href="#"><i class="fa fa-calendar-check-o"></i> <span>الطلبات</span></a></li>
        <li class=""><a href="#"><i class="fa fa-shopping-cart"></i> <span>المبيعات</span></a></li>      
        <li class=""><a href="#"><i class="fa fa-user"></i> <span>المستهلكين</span></a></li>      
        <li class=""><a href="#"><i class="fa fa-search"></i> <span>كلمات البحث</span></a></li>
      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>