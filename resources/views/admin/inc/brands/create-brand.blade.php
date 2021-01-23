<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        إضافة علامة تجارية
        <small>إضافةعلامة تجارية مميزة</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافةعلامة تجارية</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة علامة تجارية</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
        @csrf  
        <input type="hidden" name="brand_user_id" id="brand_user_id" value="{{Auth::user()->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('brand_name')? 'has-error':''}}">
              <label for="brand_name">اسم العلامة التجارية</label>
              <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="أكتب اسم العلامة التجارية" value="{{old('brand_name')}}">
              @if($errors->has('brand_name'))
              <span class="help-block">
              {{ $errors->first('brand_name')}}
              </span>
              @endif
            </div>
            <div class="form-group">
              <label for="brand_image">صورة العلامة التجارية</label>
              <input type="file" name="brand_image" id="brand_image">              
              @if($errors->has('brand_image'))
              <span class="help-block">
              {{ $errors->first('brand_image')}}
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