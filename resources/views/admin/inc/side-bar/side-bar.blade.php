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
      <li class="treeview {{active_categories_links_group()}}">
        <a href="{{route('admin.categories')}}"><i class="fa fa-tag"></i> <span>الأصناف</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
          <li class="{{active_categories_link()}}"><a href="{{route('admin.categories')}}">كل الأصناف</a></li>
          <li class="{{active_create_categories_link()}}"><a href="{{route('admin.create.categories')}}">إضافة صنف</a></li>
          <li class="{{active_create_sub_categories_link()}}"><a href="{{route('admin.create.sub_categories')}}">إضافة صنف تحت الصنف</a></li>
          <li class="{{active_create_sub_sub_categories_link()}}"><a href="{{route('admin.create.sub_sub_categories')}}">إضافة صنف تحت تحت الصنف</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-product-hunt"></i> <span>المنتجات</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">كل المنتجات</a></li>
            <li><a href="#">إضافة منتج</a></li>
          </ul>
        </li>
        <li class=""><a href="#"><i class="fa fa-chain"></i> <span>ربط المنتجات ببعضها</span></a></li>      
        <li class="treeview">
          <a href="#"><i class="fa fa-bullhorn"></i> <span>العروض</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">كل العروض</a></li>
            <li><a href="#">إضافة عرض</a></li>
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