{{-- @foreach($dis_products as $index => $product) --}}
{{-- @php
    $product=App\product::find(2);
@endphp --}}
@if(get_dis_product_exp_day($product->discount->exp_date)>0)
                                        {{-- <li><span id="days{{$index}}"> ي</span></li>
                                        <li><span id="heurs{{$index}}">سا</span></li>
                                        <li><span id="munites{{$index}}">د</span></li> --}}
                                        <li><span>@if(get_dis_product_exp_day($product->discount->exp_date)<10){{'0'}}@endif{{get_dis_product_exp_day($product->discount->exp_date)}} ي</span></li>
                                        <li><span>@if(get_dis_product_exp_heur($product->discount->exp_date)<10){{'0'}}@endif{{get_dis_product_exp_heur($product->discount->exp_date)}} سا</span></li>
                                        <li><span>@if(get_dis_product_exp_munite($product->discount->exp_date)<10){{'0'}}@endif{{get_dis_product_exp_munite($product->discount->exp_date)}} د</span></li>
                                        @else
                                        {{-- <li><span id="heurs{{$index}}"> سا</span></li>
                                        <li><span id="munites{{$index}}">د</span></li>
                                        <li><span id="seconds{{$index}}">ثا</span></li> --}}
                                        <li><span>@if(get_dis_product_exp_heur($product->discount->exp_date)<10){{'0'}}@endif{{get_dis_product_exp_heur($product->discount->exp_date)}} سا</span></li>
                                        <li><span>@if(get_dis_product_exp_munite($product->discount->exp_date)<10){{'0'}}@endif{{get_dis_product_exp_munite($product->discount->exp_date)}} د</span></li>
                                        <li><span>@if(get_dis_product_exp_sec($product->discount->exp_date)<10){{'0'}}@endif{{get_dis_product_exp_sec($product->discount->exp_date)}} ثا</span></li>
                                        @endif
                                        {{-- @endforeach --}}