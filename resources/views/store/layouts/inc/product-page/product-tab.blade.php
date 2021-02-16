<div class="product-tab">
    <ul class="tab-nav">
        <li><a data-toggle="tab" href="#tab0">وصف المنتج</a></li>
        <li><a data-toggle="tab" href="#tab1">تفاصيل المنتج</a></li>
        <li class="active"><a data-toggle="tab" href="#tab2">المراجعات ({{count($product->reatings)}})</a></li>
    </ul>
    <div class="tab-content">
        <div id="tab0" class="tab-pane fade in ">
            <p>{{$product->short_description}}</p>
        </div>
        <div id="tab1" class="tab-pane fade in">
            <p>{{$product->long_description}}</p>
        </div>
        <div id="tab2" class="tab-pane fade in active">

            <div class="row">
                <div class="col-md-6">
                    <div class="product-reviews">
                        @if($reviews->count()>0)
                        @foreach($reviews as $index => $review)
                        <div class="single-review">
                            <div class="review-heading">
                                <div><a href="#"><i class="fa fa-user-o"></i>{{$review->name}}</a></div>
                                <div><a href="#"><i class="fa fa-clock-o"></i> {{$review->created_at->diffForHumans()}}</a></div>
                                <div class="review-rating pull-right starrr">
                                    {{-- <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i> --}}
                                    {{-- <div id="consumer_id" data-consumer="{{$review->consumer->id}}"></div>--}}
                                    <div name="consumer_rating" data-rating="{{get_product_reating_from_consumer_created_at($product->id,$review->created_at)}}"></div>
                                    <div class="consumer-star-{{$index}}"></div>
                                </div>
                                
                            </div>
                            <div class="review-body">
                                <p>{{$review->review}}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="single-review">
                            <div class="review-heading">
                                <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                <div class="review-rating pull-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                            <div class="review-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>

                        <div class="single-review">
                            <div class="review-heading">
                                <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                <div class="review-rating pull-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                            <div class="review-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div> --}}

                        <ul class="reviews-pages">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="text-uppercase">أكتب رأيك</h4>
                    @if(!Auth::guard('consumer')->check())
                    <p>لن يتم نشر عنوان بريدك الإلكتروني</p>
                    @endif
                    <form class="review-form" action="{{route('store.create.rating')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        @if(!Auth::guard('consumer')->check())
                        <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                            <input name="name" class="input" type="text" placeholder="اسمك" value="{{old('name')}}"/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('email')? 'has-error' : ''}}">
                            <input name="email" class="input" type="email" placeholder="بريدك الإلكتروني" value="{{old('email')}}"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{$errors->first('email')}}
                                </span>
                            @endif
                        </div>
                        @endif
                        <div class="form-group {{$errors->has('rating_text')? 'has-error':''}}">
                            <textarea name="rating_text" class="input" placeholder="اكتب رأيك هنا">{{old('rating_text')}}</textarea>
                            @if ($errors->has('rating_text'))
                                <span class="help-block">
                                    {{$errors->first('rating_text')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('rating')? 'has-error' : ''}}">
                            <div class="input-rating">
                                <strong class="text-uppercase">تقييمك: </strong>
                                <div class="stars">
                                    {{-- <div class="put-stars"></div>                                     --}}                                                                                                                                                                                    
                                    <input type="radio" id="star5" name="rating" value="5" /><label class="pull-right" for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label class="pull-right" for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label class="pull-right" for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label class="pull-right" for="star2"></label>                                    
                                    <input type="radio" id="star1" name="rating" value="1" /><label class="pull-right" for="star1"></label>
                                </div>                                
                                @if ($errors->has('rating'))
                                    <span class="help-block">
                                        {{$errors->first('rating')}}
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        <button class="primary-btn">نشر</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>