<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        التخفيضات
        <small>إضافة تخفيض</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة تخفيض</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة تخفيض</h3>
        </div><!-- /.box-header -->
        <h3>سعر المنتج الأصلي : {{$product->selling_price}} د.ج</h3>
        <!-- form start -->
        <form role="form" action="{{route('admin.discount.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('discount')? 'has-error':''}}">
              <label for="discount"> التخفيض</label>
              <input type="number" class="form-control" name="discount" id="discount" placeholder="التخفيض" value="{{old('discount')}}">
              @if($errors->has('discount'))
              <span class="help-block">
              {{ $errors->first('discount')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('exp_date')? 'has-error':''}}">
              <label for="exp_date">تاريخ نهاية التخفيض</label>
              <input type="date" class="form-control" name="exp_date" id="exp_date" placeholder="" value="{{old('exp_date')}}">
              @if($errors->has('exp_date'))
              <span class="help-block">
              {{ $errors->first('exp_date')}}
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