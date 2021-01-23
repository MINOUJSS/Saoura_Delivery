<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المستخدمين
        <small>تعديل مستخدم</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل مستخدم</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">تعديل مستخدم</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.user.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}" >
          <div class="box-body">
            <div class="form-group {{$errors->has('user_name')? 'has-error':''}}">
              <label for="user_name">الاسم</label>
              <input type="text" class="form-control" name="user_name" id="user_name" placeholder="اسم المستخدم" value="@if(old('user_name')){{old('user_name')}}@else {{$user->name}} @endif">
              @if($errors->has('user_name'))
              <span class="help-block">
              {{ $errors->first('user_name')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('user_email')? 'has-error':''}}">
              <label for="user_email">البريد الإلكتروني</label>
              <input type="email" class="form-control" name="user_email" id="user_email" placeholder="البريد الإلكتروني" value="@if(old('user_email')){{old('user_email')}}@else {{$user->email}} @endif">
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
                <option value="0" @if(old('user_type')=='إختر وظيفة للمستخدم' || $user->type==0) {{'selected'}} @endif>إختر وظيفة للمستخدم</option>
                <option value="1" @if(old('user_type')=='بائع' || $user->type==1) {{'selected'}} @endif>بائع</option>
                <option value="2" @if(old('user_type')=='مؤكد الطلبات' || $user->type==2) {{'selected'}} @endif>مؤكد الطلبات</option>
                <option value="3" @if(old('user_type')=='موصل الطلبات' || $user->type==3) {{'selected'}} @endif>موصل الطلبات</option>
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