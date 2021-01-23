<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الألوان
        <small>تعديل لون</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل لون</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة الألوان</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.color.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="color_color_id" id="color_color_id" value="{{$color->id}}">
          <input type="hidden" name="color_user_id" id="color_user_id" value="{{Auth::user()->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('color_name')? 'has-error':''}}">
              <label for="color_name">اسم اللون</label>
              <input type="text" class="form-control" name="color_name" id="color_name" placeholder="إسم اللون" value="@if(old('color_name')){{old('color_name')}}@else {{$color->name}} @endif">
              @if($errors->has('color_name'))
              <span class="help-block">
              {{ $errors->first('color_name')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('color_code')? 'has-error':''}}">
              <label for="color_hashcode">رمز اللون</label>
              <input type="text" class="form-control" name="color_code" id="color_code" placeholder="#FFFFFF" value="@if(old('color_code')){{old('color_code')}} @else {{$color->code}} @endif">
              @if($errors->has('color_code'))
              <span class="help-block">
              {{ $errors->first('color_code')}}
              </span>
              @endif
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->