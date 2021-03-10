@if($sizes->count()>0)
<div class="aside">
    <h3 class="aside-title">فرز حسب المقاس:</h3>
    <ul class="size-option">
        @foreach($sizes as $size)
        <li class="active" style="cursor:pointer;"><a onclick="add_size_to_searcher({{$size->id}})">{{$size->size}}</a></li>
        @endforeach
        {{-- 
            href="{{route('searcher.size.add',$size->id)}}"
            <li class="active"><a href="#">S</a></li>
        <li class="active"><a href="#">XL</a></li>
        <li><a href="#">SL</a></li> --}}
    </ul>
</div>
@endif