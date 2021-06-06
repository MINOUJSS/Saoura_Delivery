<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الألوان
        <small>إضافة لون</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة لون</li>
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
        <form role="form" action="{{route('admin.color.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="color_user_id" id="color_user_id" value="{{Auth::user()->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('color_name')? 'has-error':''}}">
              <label for="color_name">اسم اللون</label>
              <input type="text" class="form-control" name="color_name" id="color_name" placeholder="إسم اللون" value="{{old('color_name')}}">
              @if($errors->has('color_name'))
              <span class="help-block">
              {{ $errors->first('color_name')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('color_code')? 'has-error':''}}">
              <label for="color_hashcode">رمز اللون</label>
              <input type="text" class="form-control" name="color_code" id="color_code" placeholder="#FFFFFF" value="{{old('color_code')}}">
              @if($errors->has('color_code'))
              <span class="help-block">
              {{ $errors->first('color_code')}}
              </span>
              @endif
            </div>
            <!---->
            {{-- <div class="form-group">
              <label>Color picker with addon:</label>
              <div class="input-group my-colorpicker2 colorpicker-element">
                <input type="text" class="form-control">
                <div class="input-group-addon">
                  <i style="background-color: rgb(0, 0, 0);"></i>
                </div>
              </div><!-- /.input group -->
            </div> --}}
            <!---->
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  {{-- @section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@stop --}}