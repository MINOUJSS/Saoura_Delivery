<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        كلمات البحث
        <small>كل كلمات البحث للزبائن</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">كلمات البحث</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول كلمات البحث</h3>
          <div class="box-tools">
            <div class="input-group" style="width: 150px;">
              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>#</th>
              <th>اسم الزبون</th>
              <th>كلمة البحث</th>
              <th>تارخ البحث</th>
              <th>العمليات</th>
            </tr>
            @if($searsh_words->count()>0)
            @foreach($searsh_words as $index=>$s_word)
            <tr>
              <td>{{$index + 1}}</td>
              @if($s_word->consumer!=null && $s_word->consumer->name!='Default')
              <td>{{$s_word->consumer->name}}</td>
              @else 
              <td>زبون غير مسجل</td>
              @endif
              <td>{{$s_word->word}}</td>
              <td>{{$s_word->created_at->diffForHumans()}}</td>
              <td></td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td></td>
                <td></td>
                <td><i class="fa fa-frown-o text-danger"> لا يوجد كلمات بحث مسجلة</i></td>
                <td></td>
            </tr>
            @endif
          </tbody></table>
          {{$searsh_words->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->