<div class="aside">
    <h3 class="aside-title">فرز حسب العلامة التجارية</h3>
    <ul class="list-links">
        @foreach ($brands as $brand)
        <li style="cursor:pointer;"><a onclick="add_brand_to_searcher({{$brand->id}})">{{$brand->name}}</a></li>
        @endforeach
        {{-- <li><a href="#">Nike</a></li>
        <li><a href="#">Adidas</a></li>
        <li><a href="#">Polo</a></li>
        <li><a href="#">Lacost</a></li> --}}
    </ul>
</div>