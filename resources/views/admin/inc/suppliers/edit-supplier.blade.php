<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الموردون
        <small>تعديل مورد</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل مورد</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة مورد</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.supplier.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('supplier_name')? 'has-error':''}}">
              <label for="supplier_name">الاسم</label>
              <input type="text" class="form-control" name="supplier_name" id="supplier_name" placeholder="إسم المورد" value="@if(old('supplier_name')) {{old('supplier_name')}}@else {{$supplier->name}}@endif">
              @if($errors->has('supplier_name'))
              <span class="help-block">
              {{ $errors->first('supplier_name')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('supplier_email')? 'has-error':''}}">
              <label for="supplier_email">البريد الإلكتروني</label>
              <input type="text" class="form-control" name="supplier_email" id="supplier_email" placeholder="أكتب البريد الإلكتروني للمورد" value="@if(old('supplier_email')) {{old('supplier_email')}}@else {{$supplier->email}}@endif">
              @if($errors->has('supplier_email'))
              <span class="help-block">
              {{ $errors->first('supplier_email')}}
              </span>
              @endif
            </div> 
            <div class="form-group {{$errors->has('supplier_mobile')? 'has-error':''}}">
              <label for="supplier_mobile">الهاتف</label>
              <input type="text" class="form-control" name="supplier_mobile" id="supplier_mobile" placeholder="رقم هاتف المورد" value="@if(old('supplier_mobile')) {{old('supplier_mobile')}}@else {{$supplier->mobile}}@endif">
              @if($errors->has('supplier_mobile'))
              <span class="help-block">
              {{ $errors->first('supplier_mobile')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('supplier_address')? 'has-error':''}}">
              <label for="supplier_adrress">عنوان محل المورد</label>
              <textarea class="form-control" name="supplier_address" id="supplier_address" placeholder="أكتب عنوان محل المورد" rows="5">@if(old('supplier_address')) {{old('supplier_address')}}@else {{$supplier->address}}@endif</textarea>
              @if($errors->has('supplier_address'))
              <span class="help-block">
              {{ $errors->first('supplier_address')}}
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