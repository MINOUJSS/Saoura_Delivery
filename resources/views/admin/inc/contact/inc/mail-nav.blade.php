<div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="{{route('admin.all.contacts')}}"><i class="fa fa-inbox"></i> البريد الوارد @if(get_no_read_contact()>0)<span class="label label-primary pull-right">{{get_no_read_contact()}}</span>@endif</a></li>
      <li><a href="{{route('admin.all.replys')}}"><i class="fa fa-envelope-o"></i> البريد الصادر</a></li>
      {{-- <li><a href="#"><i class="fa fa-file-text-o"></i> المسودات</a></li> --}}
      {{-- <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li> --}}
      <li><a href="{{route('admin.all.deleted.contacts')}}"><i class="fa fa-trash-o"></i> المحذوفات @if(get_deleted_contact_data()->count()>0)<span class="label label-danger pull-right">{{get_deleted_contact_data()->count()}}</span>@endif</a></li>
    </ul>
  </div><!-- /.box-body -->