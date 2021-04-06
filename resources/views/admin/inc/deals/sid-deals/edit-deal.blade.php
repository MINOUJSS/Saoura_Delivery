<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تعديل عرض جانبي
        <small>تعديل عرض جانبي لمنتج معين</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل عرض</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
  
      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">تعديل عرض خاص</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.sid.deal.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="deal_id" value="{{$deal->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="box-body">
            <div class="form-group {{$errors->has('product_id')? 'has-error':''}}">
              <label for="product_id">رقم المنتج</label>
              <input type="number" class="form-control" name="product_id" id="product_id" placeholder="أكتب رقم النتج هنا" value="@if(!old('product_id')){{$deal->product_id}}@else {{old('product_id')}}@endif">
              @if($errors->has('product_id'))
              <span class="help-block">
                {{ $errors->first('product_id')}}
              </span>
            @endif
            </div>
            <div class="form-group {{$errors->has('title')? 'has-error':''}}">
              <label for="title">عنوان العرض</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="أكتب عنوان العرض هنا" value="@if(!old('title')){{$deal->title}}@else {{old('title')}}@endif">
              @if($errors->has('title'))
              <span class="help-block">
                {{ $errors->first('title')}}
              </span>
            @endif
            </div>            
            <div class="form-group {{$errors->has('link')? 'has-error':''}}">
              <label for="link">رابط المنتج</label>
              <input type="text" class="form-control" name="link" id="link" placeholder="أكتب رابط المنتج هنا" value="@if(!old('link')){{$deal->link}}@else {{old('link')}}@endif">
              @if($errors->has('link'))
              <span class="help-block">
                {{ $errors->first('link')}}
              </span>
            @endif
            </div>
            <div class="form-group {{$errors->has('exp_date')? 'has-error':''}}">
                <label for="exp_date">تاريخ نهاية الصلاحية</label>
                <input type="date" class="form-control" name="exp_date" id="exp_date" placeholder="تاريخ نهاية الصلاحية" value="@if(!old('exp_date')){{$deal->exp_date}}@else {{old('exp_date')}}@endif">
                @if($errors->has('exp_date'))
                <span class="help-block">
                  {{ $errors->first('exp_date')}}
                </span>
              @endif
              </div>
            <div class="form-group {{$errors->has('image')? 'has-error':''}}">
              <label for="image">صورة العرض ( 438 263X)</label>
              <input type="file" name="image" id="image">
              @if($errors->has('image'))
              <span class="help-block">
                {{$errors->first('image')}}
              </span>
              @endif
            </div>
          </div><!-- /.box-body -->
    
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">نشر</button>
          </div>
        </form>
      </div>
      <!--End OF Your Page Content Here-->
  
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->