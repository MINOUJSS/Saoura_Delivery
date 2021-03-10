@if($colors->count()>0)
<div class="aside">    
    <h3 class="aside-title">فرز حسب اللون:</h3>
    <ul class="color-option">
        @foreach ($colors as $color)
        <li style="cursor:pointer;"><a onclick="add_color_to_searcher({{$color->id}})" style="background-color:{{$color->code}};"></a></li>
        @endforeach
        {{-- 
            href="{{route('searcher.color.add',$color->id)}}"
            
            <li><a href="#" style="background-color:#475984;"></a></li>
        <li><a href="#" style="background-color:#8A2454;"></a></li>
        <li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
        <li><a href="#" style="background-color:#9A54D8;"></a></li>
        <li><a href="#" style="background-color:#675F52;"></a></li>
        <li><a href="#" style="background-color:#050505;"></a></li>
        <li><a href="#" style="background-color:#D5B47B;"></a></li> --}}
    </ul>
</div>
@endif