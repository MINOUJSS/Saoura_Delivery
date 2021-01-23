<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المستخدمين
        <small>إضافة مستخدم</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة مستخدم</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة مستخدم</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
          @csrf           
          <div class="box-body">
            <div class="form-group {{$errors->has('user_name')? 'has-error':''}}">
              <label for="user_name">الاسم</label>
              <input type="text" class="form-control" name="user_name" id="user_name" placeholder="اسم المستخدم" value="{{old('user_name')}}">
              @if($errors->has('user_name'))
              <span class="help-block">
              {{ $errors->first('user_name')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('user_email')? 'has-error':''}}">
              <label for="user_email">البريد الإلكتروني</label>
              <input type="email" class="form-control" name="user_email" id="user_email" placeholder="البريد الإلكتروني" value="{{old('user_email')}}">
              @if($errors->has('user_email'))
              <span class="help-block">
              {{ $errors->first('user_email')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('user_password')? 'has-error':''}}">
              <label for="user_password">كلمة المرور</label>
              <input type="password" class="form-control" name="user_password" id="user_password" placeholder="كلمة المرور" value="{{old('user_password')}}">
              @if($errors->has('user_password'))
              <span class="help-block">
              {{ $errors->first('user_password')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('user_type')? 'has-error':''}}">
              <label for="user_type">وظيفة المستخدم</label>          
              <select class="form-control" name="user_type">
                <option value="0">إختر وظيفة للمستخدم</option>
                <option value="1">بائع</option>
                <option value="2">مؤكد الطلبات</option>
                <option value="3">موصل الطلبات</option>
            </select>
              @if($errors->has('user_type'))
              <span class="help-block">
              {{ $errors->first('user_type')}}
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