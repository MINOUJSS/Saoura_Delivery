@php
use App\product_videos;
    $videos=product_videos::where('product_id',$product->id)->get();
    //dd();
@endphp
@if(is_this_product_has_videos($product->id))
<div class="row">
    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="title">فيديوهات المنتج</h2>
        </div>
    </div>
    <!-- section title -->   
    @foreach($videos as $video)
    <div class="col-md-6">
    <iframe style="height:315px;width:100%;" src="https://www.youtube.com/embed/{{$video->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    @endforeach
</div>
@endif