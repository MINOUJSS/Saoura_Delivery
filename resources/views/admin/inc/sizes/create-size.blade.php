<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المقاسات
        <small>إضافة مقاس</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة مقاس</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة مقاس</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.size.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="size_user_id" id="size_user_id" value="{{Auth::user()->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('size_name')? 'has-error':''}}">
              <label for="size_name">اسم المقاس</label>
              <input type="text" class="form-control" name="size_name" id="size_name" placeholder="إسم المقاس" value="{{old('size_name')}}">
              @if($errors->has('size_name'))
              <span class="help-block">
              {{ $errors->first('size_name')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('size_size')? 'has-error':''}}">
              <label for="size_size">المقاس</label>
              <input type="text" class="form-control" name="size_size" id="size_size" placeholder="المقاس" value="{{old('size_size')}}">
              @if($errors->has('size_size'))
              <span class="help-block">
              {{ $errors->first('size_size')}}
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