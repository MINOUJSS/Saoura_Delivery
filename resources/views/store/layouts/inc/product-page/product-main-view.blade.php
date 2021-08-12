<div class="col-md-6">
    <div id="product-main-view">
        <div class="product-view">
            <img src="{{url('admin-css/uploads/images/products/'.$product->image)}}">
        </div>
        @if(count(get_all_product_images($product->id))>=1)
        @foreach(get_all_product_images($product->id) as $image)                    
        <div class="product-view">
        <img src="{{$image}}">
        </div>
        @endforeach
        @endif
        {{-- <div class="product-view">
            <img src="{{url('store')}}/img/main-product02.jpg" alt="">
        </div>
        <div class="product-view">
            <img src="{{url('store')}}/img/main-product03.jpg" alt="">
        </div>
        <div class="product-view">
            <img src="{{url('store')}}/img/main-product04.jpg" alt="">
        </div> --}}
    </div>
    <div id="product-view">
        <div class="product-view">
            <img src="{{url('admin-css/uploads/images/products/'.$product->image)}}">
        </div>
        @if(count(get_all_product_images($product->id))>=1)
        @foreach(get_all_product_images($product->id) as $image)
        <div class="product-view">
            <img src="{{$image}}" alt="test test">
        </div>
        @endforeach
        @endif
        {{-- <div class="product-view">
            <img src="{{url('store')}}/img/thumb-product03.jpg" alt="">
        </div>
        <div class="product-view">
            <img src="{{url('store')}}/img/thumb-product04.jpg" alt="">
        </div> --}}
    </div>
</div>