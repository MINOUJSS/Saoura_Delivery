<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      إضافة صنف
      <small>إضافة أصناف المنتجات</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
      <li class="active">إضافة صنف</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">إضافة صنف</h3>
    </div><!-- /.box-header -->                          
                <!-- form start -->
              <form role="form" action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf 
                  <div class="col-lg-6">                            
                  <div class="box-body">
                    <div class="form-group {{$errors->has('category')? 'has-error':''}}">
                      <label for="category">إسم الصنف</label>
                    <input name="category" type="text" class="form-control" id="category" placeholder="أدخل إسم الصنف هنا" value="{{old('category')}}">
                      @if($errors->has('category'))
                        <span class="help-block">
                          {{ $errors->first('category')}}
                        </span>
                      @endif
                    </div>
                  <div class="form-group {{$errors->has('image')? 'has-error':''}}">
                      <label for="exampleInputFile">صورة للصنف</label>
                      <input type="file" name="image" id="exampleInputFile">
                      @if($errors->has('image'))
                      <span class="help-block">
                        {{$errors->first('image')}}
                      </span>
                      @endif
                      {{-- <p class="help-block">رسالة تنبيهية هنا.</p> --}}
                    </div>
                  </div><!-- /.box-body --> 
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary">حفظ</button>                  
                  </div>
                  </div><!--col-lg-6-->
                  <div class="col-lg-6">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">جدول الأصناف</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>الصنف</th>
                            <th>التاريخ</th>
                            <th>العمليات</th>
                          </tr>
                          @if($categories->count()>0)
                          @foreach($categories as $index=>$category)
                          <tr>
                            <td>{{$index + 1 }}.</td>
                          <td>{{$category->name}}</td>
                          <td>{{$category->created_at}}</td>
                            <td><a href="{{url('admin/category').'/'.$category->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_category" title="{{$category->name}}" url="{{url('admin/category').'/'.$category->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>
                          </tr>
                          @endforeach             
                          @else 
                              <tr>
                                <td></td>
                                <td></td>
                                <td>لا توجد أصناف مسجلة</td>
                                <td></td>
                              </tr>
                              @endif             
                        </tbody></table>
                        {{$categories->links()}}
                      </div><!-- /.box-body -->
                    </div>
                  </div><!--col-lg-6-->
                  <div class="box-footer">
                    {{-- <button type="submit" class="btn btn-primary">حفظ</button> --}}
                  </div>
                  </form>
                </div>
</div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->