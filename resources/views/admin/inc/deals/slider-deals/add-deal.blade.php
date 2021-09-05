<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      إضافة عرض
      <small>إضافة عرض لمنتج معين</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
      <li class="active">إضافة عرض</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">إضافة عرض خاص</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{route('admin.deal.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <div class="box-body">
          <div class="form-group {{$errors->has('product_id')? 'has-error':''}}">
            <label for="product_id">رقم المنتج</label>
            <input type="number" class="form-control" name="product_id" id="product_id" placeholder="أكتب رقم النتج هنا" value="{{old('product_id')}}">
            @if($errors->has('product_id'))
            <span class="help-block">
              {{ $errors->first('product_id')}}
            </span>
          @endif
          </div>
          <div class="form-group {{$errors->has('title')? 'has-error':''}}">
            <label for="title">عنوان العرض</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="أكتب عنوان العرض هنا" value="{{old('title')}}">
            @if($errors->has('title'))
            <span class="help-block">
              {{ $errors->first('title')}}
            </span>
          @endif
          </div>
          <div class="form-group {{$errors->has('daitels')? 'has-error':''}}">
            <label for="daitels">تفاصيل العرض</label>
            <textarea placeholder="أكتب تفاصيل العرض هنا" name="daitels" class="form-control" id="article-ckeditor" rows="4"></textarea>
            @if($errors->has('daitels'))
            <span class="help-block">
              {{ $errors->first('daitels')}}
            </span>
          @endif
          </div>
          {{-- <div class="form-group {{$errors->has('descount')? 'has-error':''}}">
            <label for="descount">قيمة التخفيض</label>
            <input type="number" class="form-control" name="descount" id="descount" placeholder="أكتب قيمة التخفيض هنا" value="{{old('descount')}}">
            @if($errors->has('descount'))
            <span class="help-block">
              {{ $errors->first('descount')}}
            </span>
          @endif
          </div> --}}
          <div class="form-group {{$errors->has('link')? 'has-error':''}}">
            <label for="link">رابط المنتج</label>
            <input type="text" class="form-control" name="link" id="link" placeholder="أكتب رابط المنتج هنا" value="{{old('link')}}">
            @if($errors->has('link'))
            <span class="help-block">
              {{ $errors->first('link')}}
            </span>
          @endif
          </div>
          <div class="form-group {{$errors->has('image')? 'has-error':''}}">
            <label for="image">صورة العرض ( 1200 675X)</label>
            <input type="file" name="image" id="image">
            @if($errors->has('image'))
            <span class="help-block">
              {{$errors->first('image')}}
            </span>
            @endif
          </div>
        </div><!-- /.box-body -->
        <div class="form-group">
          <label for="view_type">طريقةعرض السلايدر</label>
          <select name="view_type">
            <option value="1" @if(old('view_type')===1){{'selected'}}@endif>عرض الصورة  فقط مع  زر المشاهدة</option>
            <option value="2" @if(old('view_type')===2){{'selected'}}@endif>عرض إسم المنتج والوصف والصورةو  زر  المشاهدة</option>
          </select>
        </div>
  
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">نشر</button>
        </div>
      </form>
    </div>
    <!--End OF Your Page Content Here-->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->