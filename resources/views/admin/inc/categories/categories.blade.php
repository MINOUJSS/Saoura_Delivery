<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        كل الأصناف
        <small>عرض كل أصناف المنتجات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">كل الأصناف</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
  
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class="active"><a href="#сategory" data-toggle="tab" aria-expanded="false">الأصناف</a></li>
              <li class=""><a href="#sub_category" data-toggle="tab" aria-expanded="false">تحت الأصناف</a></li>
              <li class=""><a href="#sub_sub_category" data-toggle="tab" aria-expanded="true">تحت تحت الأصناف</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="сategory">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">جدول الأصناف</h3>
                    </div><!-- /.box-header -->
                    <div id="datatable" class="box-body">
                      <table class="table table-bordered">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th>إسم الصنف</th>
                          <th>عدد التصنيفات تحت التصنيف</th>
                          <th>عدد التصنيفات  تحت تحت التصنيف</th>
                          <th>تاريخ النشر</th>
                          <th>العمليات</th>
                        </tr>
                        @if($categories->count())
                        @foreach($categories as $index=>$category)
                        <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$category->name}}</td>                        
                        <td>{{get_sub_categories_count($category->id)}}</td>
                        <td>{{get_sub_sub_categories_count_for_category_id($category->id)}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td><a href="{{url('admin/category').'/'.$category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_category" title="{{$category->name}}" url="{{url('admin/category').'/'.$category->id.'/delete'}}" class="fa fa-trash text-danger cursor-pointer"></i></td>
                        {{-- <td><a href="{{url('admin/category').'/'.$category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a> <a id="delete_category" title="{{$category->name}}" href="" url="{{url('admin/category').'/'.$category->id.'/destroy'}}"><i class="fa fa-trash text-danger cursor-pointer"></i></a></td> --}}
                        </tr>
                        <tr> 
                        @endforeach
                        @else 
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>لا توجد أصناف مسجلة</td>
                                <td></td>
                                <td></td>
                              </tr>
                              @endif                       
                      </tbody></table>                      
                    </div><!-- /.box-body -->
                    {{-- <div class="box-footer clearfix">
                      <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                    </div> --}}
                  </div>
              </div><!-- /.tab-pane -->
              <div class="tab-pane" id="sub_category">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">جدول تحت الأصناف</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body" id="datatable2">
                      <table class="table table-bordered">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th>إسم تحت الصنف</th>
                          <th>عدد التصنيفات  تحت تحت التصنيف</th>
                          <th>تاريخ النشر</th>
                          <th>العمليات</th>
                        </tr>
                        @if($sub_categories->count())
                        @foreach($sub_categories as $index=>$sub_category)
                        <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$sub_category->name}}</td>
                        <td>{{get_sub_sub_categories_count_for_sub_category_id($sub_category->id)}}</td>
                        <td>{{$sub_category->created_at->diffForHumans()}}</td>
                        <td><a href="{{url('admin/sub-category').'/'.$sub_category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_sub_category" title="{{$sub_category->name}}" url="{{url('admin/sub-category').'/'.$sub_category->id.'/delete'}}" class="fa fa-trash text-danger cursor-pointer"></i></td>
                        {{-- <td><a href="{{url('admin/category').'/'.$sub_category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a> <a href="{{url('admin/category').'/'.$sub_category->id.'/destroy'}}"><i class="fa fa-trash text-danger"></i></a></td> --}}
                        </tr>
                        <tr> 
                        @endforeach        
                        @else 
                        <tr>
                          <td></td>
                          <td></td>
                          <td>لا توجد تحت أصناف مسجلة</td>
                          <td></td>
                          <td></td>
                        </tr>
                        @endif               
                      </tbody></table>                                            
                    </div><!-- /.box-body -->
                    {{-- <div class="box-footer clearfix">
                      <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                    </div> --}}
                  </div>
              </div><!-- /.tab-pane -->
              <div class="tab-pane" id="sub_sub_category">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">جدول تحت تحت الأصناف</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body" id="datatable3">
                      <table class="table table-bordered">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th>إسم تحت تحت الصنف</th>
                          <th>تاريخ النشر</th>
                          <th>العمليات</th>
                        </tr>
                        @if($sub_sub_categories->count())
                        @foreach($sub_sub_categories as $index=>$sub_sub_category)
                        <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$sub_sub_category->name}}</td>
                        <td>{{$sub_sub_category->created_at->diffForHumans()}}</td>
                        <td><a href="{{url('admin/sub-sub-category').'/'.$sub_sub_category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_sub_sub_category" title="{{$sub_sub_category->name}}" url="{{url('admin/sub-sub-category').'/'.$sub_sub_category->id.'/delete'}}" class="fa fa-trash text-danger cursor-pointer"></i></td>
                        {{-- <td><a href="{{url('admin/category').'/'.$sub_sub_category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a> <a href="{{url('admin/category').'/'.$sub_sub_category->id.'/destroy'}}"><i class="fa fa-trash text-danger"></i></a></td> --}}
                        </tr>
                        <tr> 
                        @endforeach         
                        @else 
                        <tr>
                          <td></td>
                          <td></td>                          
                          <td>لا توجد تحت أصناف مسجلة</td>
                          <td></td>
                        </tr>
                        @endif              
                      </tbody></table>
                    </div><!-- /.box-body -->
                    {{-- <div class="box-footer clearfix">
                      <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                    </div> --}}
                  </div>
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          </div>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->