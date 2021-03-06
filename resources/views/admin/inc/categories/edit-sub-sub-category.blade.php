<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        إضافة تحت تحت الصنف
        <small>إضافة تحت تحت أصناف المنتجات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة تحت تحت صنف</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة تحت تحت صنف</h3>
        </div><!-- /.box-header -->
                    @if($sub_categories->count()>0)                          
                    <!-- form start -->
                  <form role="form" action="{{route('admin.sub_sub_category.update')}}" method="POST" enctype="multipart/form-data">
                      @csrf 
                      <div class="col-lg-6">                            
                      <div class="box-body">
                        <div class="form-group {{$errors->has('sub_category')? 'has-error':''}}">
                          <input type="hidden" name="sub_sub_category_id" value="{{$sub_sub_category->id}}">
                          <label for="sub_category">إختر تحت الصنف الذي ينتمي إليه تحت تحت الصنف</label>
                            <select class="form-control" name="sub_category">
                              <option value="0">إختر تحت صنف</option>
                              @foreach($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}" @if(old('sub_category')==$sub_category->name || $sub_sub_category->sub_category_id==$sub_category->id) selected @endif >{{$sub_category->name}}</option>
                              @endforeach
                            </select>
                          @if($errors->has('sub_category'))
                            <span class="help-block">
                              {{ $errors->first('sub_category')}}
                            </span>
                          @endif
                        </div>
                        <div class="form-group {{$errors->has('sub_sub_category')? 'has-error':''}}">
                          <label for="sub_sub_category">إسم تحت تحت الصنف</label>
                        <input name="sub_sub_category" type="text" class="form-control" id="sub_sub_category" placeholder="أدخل إسم تحت الصنف هنا" value="@if (old('category')!=null) {{old('category')}} @else {{$sub_sub_category->name}} @endif">
                          @if($errors->has('sub_sub_category'))
                            <span class="help-block">
                              {{ $errors->first('sub_sub_category')}}
                            </span>
                          @endif
                        </div>
                      </div><!-- /.box-body --> 
                      <div class="form-group">
                      <button type="submit" class="btn btn-primary">حفظ</button>                  
                      </div>
                    </form>
                  </div><!--col-lg-6-->
                    @else 
                    <div class="col-lg-6">
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> تنبيه</h4>
                      لايمكنك إضافة تحت تحت الأصناف قبل إضافة تحت الصنف الذي ينتمي إليه.
                    </div>
                  </div><!--col-lg-6-->
                    @endif                      
                      <div class="col-lg-6">
                        <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">جدول تحت تحت الأصناف</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body no-padding">
                            <table class="table table-condensed">
                              <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>الصنف</th>
                                <th>التاريخ</th>
                                <th>العمليات</th>
                              </tr>
                              @if($sub_sub_categories->count()>0)
                              @foreach($sub_sub_categories as $index=>$sub_sub_category)
                              <tr>
                                <td>{{$index + 1 }}.</td>
                              <td>{{$sub_sub_category->name}}</td>
                              <td>{{$sub_sub_category->created_at}}</td>
                                <td><a href="{{url('admin/sub-sub-category').'/'.$sub_sub_category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_category" title="{{$sub_sub_category->name}}" url="{{url('admin/sub-sub-category').'/'.$sub_sub_category->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>
                              </tr>
                              @endforeach
                              @else 
                              <tr>
                                <td></td>
                                <td></td>
                                <td>لا توجد تحت تحت أصناف مسجلة</td>
                                <td></td>
                              </tr>
                              @endif
                            </tbody></table>
                            {{$sub_sub_categories->links()}}
                          </div><!-- /.box-body -->
                        </div>
                      </div><!--col-lg-6-->
                      <div class="box-footer">
                        {{-- <button type="submit" class="btn btn-primary">حفظ</button> --}}
                      </div>
                      
                    </div>
    </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->