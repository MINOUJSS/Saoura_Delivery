<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('store')}}">الرئيسية</a></li>
            <li class="active">الدفع</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">محتوى العربة</h3>
                    </div>
                    @if(session()->has('cart'))
                    <table class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th>المنتج</th>
                                <th></th>
                                <th class="text-center">السعر</th>
                                <th class="text-center">الكمية</th>
                                <th class="text-center">المجموع</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session()->has('cart'))
                            @foreach(session()->get('cart')->items as $item)
                            <form name="form{{$item['id']}}" action="{{route('cart.update',$item['id'])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <tr>
                            <td class="thumb"><img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt=""></td>
                                <td class="details">
                                    <a href="{{url('product/'.$item['id'])}}">{{$item['title']}}</a>
                                    {{-- <ul>
                                        <li><span>Size: XL</span></li>
                                        <li><span>Color: Camelot</span></li>
                                    </ul>  --}}                                                                               
                                    {!!print_product_colors_html($item['id'])!!}
                                    {!!print_product_sizes_html($item['id'])!!}
                                </td>
                                <td class="price text-center">@if(has_discount($item['id']))<strong>{{$item['price']}} د.ج</strong><br><del class="font-weak"><small>{{get_product_price_by_id($item['id'])}}</small></del>@else <strong>{{get_product_price_by_id($item['id'])}} </strong>@endif</td>
                                <td class="qty text-center">
                                    
                                    <input class="input" type="number" name="qty" value="{{$item['qty']}}">                                        
                                    <input class="btn btn-primary" type="submit" name="submit" value="حفظ">                                        
                                </td>
                                <td class="total text-center"><strong class="primary-color">{{$item['price'] * $item['qty']}} دج</strong></td>
                                <td class="text-right"><a href="{{route('cart.remove',$item['id'])}}"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></a></td>
                            </tr>
                             </form>
                            @endforeach
                            @endif                                
                        </tbody>                            
                        <tfoot>
                            <tr>                                    
                                <th>المبلغ بدون إحتساب التوصيل</th>
                                <th colspan="2" class="sub-total">{{$subTotal=session()->get('cart')->totalPrice}} دج</th>
                                <th class="empty" colspan="3"></th>
                            </tr>
                            <tr>                                    
                                <th>سعر التوصيل</th>
                                <td colspan="2">{{$shepPrice=0}} دج</td>
                                <th class="empty" colspan="3"></th>
                            </tr>
                            <tr>                                    
                                <th>المبلغ المستحق</th>
                                <th colspan="2" class="total">{{$subTotal + $shepPrice}} دج</th>
                                <th class="empty" colspan="3"></th>
                            </tr>
                        </tfoot>                            
                    </table>
                    @else
                    <div class="text-center"> 
                    <h2>العربة فارغة</h2>
                    </div>
                    @endif
                </div>                    
            </div>            
            {{--  --}}
            <form name="order-form" id="checkout-form" class="clearfix" action="{{route('store.create.order')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!---->
                @if(session()->has('cart'))
                    @foreach(session()->get('cart')->items as $item)
                           <input type="hidden" name="product_id[]" value="{{$item['id']}}">
                           <input type="hidden" name="product_qty[]" value="{{$item['qty']}}">                           
                           <input type="hidden" name="product_color[]" value="{{$item['color_id']}}">
                           <input type="hidden" name="product_size[]" value="{{$item['size_id']}}">
                    @endforeach
                @endif
                <!---->
                <div class="col-md-6">
                    <div class="billing-details">
                        <p>زبون في المتجر ؟ <a href="{{route('consumer.login')}}">تسجيل الدخول</a></p>
                        <div class="section-title">
                            <h3 class="title">معلومات الفاتورة</h3>
                        </div>
                        <div class="form-group" {{$errors->has('first-name')? 'has-error':''}}>
                            <input class="input" type="text" name="first-name" placeholder="الإسم" value="{{old('first-name')}}">
                            @if($errors->has('first-name'))
                            <span class="help-block">
                            {{ $errors->first('first-name')}}
                            </span>
                            @endif
                        </div>
                        {{-- <div class="form-group {{$errors->has('last-name')? 'has-error':''}}">
                            <input class="input" type="text" name="last-name" placeholder="Last Name">
                            @if($errors->has('last-name'))
                            <span class="help-block">
                            {{ $errors->first('last-name')}}
                            </span>
                            @endif
                        </div> --}}
                        <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                            <input class="input" type="email" name="email" placeholder="البريد الإلكتروني" value="{{old('email')}}">
                            @if($errors->has('email'))
                            <span class="help-block">
                            {{ $errors->first('email')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('address')? 'has-error':''}}">
                            <input class="input" type="text" name="address" placeholder="عنوان إستلام المنتجات" value="{{old('address')}}">
                            @if($errors->has('address'))
                            <span class="help-block">
                            {{ $errors->first('address')}}
                            </span>
                            @endif
                        </div>
                        {{-- <div class="form-group {{$errors->has('google-map')? 'has-error':''}}">
                            <input class="input" type="text" name="google-map" placeholder="كود عنوان الإستلام على google map">
                            @if($errors->has('google-map'))
                            <span class="help-block">
                            {{ $errors->first('google-map')}}
                            </span>
                            @endif
                        </div> --}}
                        {{-- <div class="form-group {{$errors->has('city')? 'has-error':''}}">
                            <input class="input" type="text" name="city" placeholder="City">
                            @if($errors->has('city'))
                            <span class="help-block">
                            {{ $errors->first('city')}}
                            </span>
                            @endif
                        </div> --}}
                        {{-- <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div> --}}
                        {{-- <div class="form-group {{$errors->has('zip-code')? 'has-error':''}}">
                            <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            @if($errors->has('zip-code'))
                            <span class="help-block">
                            {{ $errors->first('zip-code')}}
                            </span>
                            @endif
                        </div> --}}
                        <div class="form-group {{$errors->has('tel')? 'has-error':''}}">
                            <input class="input" type="tel" name="tel" placeholder="رقم الجوال" value="{{old('tel')}}">
                            @if($errors->has('tel'))
                            <span class="help-block">
                            {{ $errors->first('tel')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password')? 'has-error':''}}">
                            <div class="input-checkbox">
                                <input type="checkbox" id="register" name="create_account" >
                                <label class="font-weak" for="register">إنشاء حساب على المتجر؟</label>
                                <div class="caption">
                                    <p>لإنشاء حساب جديد عليك إدخال كلمة مرور خاصة بك)(ملاحظة:لتجنب فقدان الحساب عليك التأكد من صحة بريدك الإلكتروني لتتمكن من إسترجاع كلمة المرور الخاصة بك في حالة النسيان).
                                        <p>
                                            <input class="input" type="password" name="password" placeholder="أدخل كلمة المرور">
                                            @if($errors->has('password'))
                                            <span class="help-block">
                                            {{ $errors->first('password')}}
                                            </span>
                                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">طرق الدفع</h4>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="shipping" id="shipping-1" checked>
                            <label for="shipping-1">الدفع عند الإستلام</label>
                            <div class="caption">
                                <p>زبوننا المحترم يرجى التأكد من صحة العنوان و رقم الهاتف ليتمكن مندوبنا من التواصل معك لإستلام منتجاتك.
                                    <p>
                                        <p><b class="text-danger">ملاحظة : </b> التوصيل مجاني في ولاية بشار</p>
                            </div>
                        </div>
                        {{-- <div class="input-checkbox">
                            <input type="radio" name="shipping" id="shipping-2">
                            <label for="shipping-2">Standard - $4.00</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                            </div>
                        </div>
                    </div>

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">Payments Methods</h4>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-1" checked>
                            <label for="payments-1">Direct Bank Transfer</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-2">
                            <label for="payments-2">Cheque Payment</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-3">
                            <label for="payments-3">Paypal System</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    <p>
                            </div>
                        </div> --}}
                    </div>
                        <div class="pull-left">
                        <button class="primary-btn"><i class="fa fa-arrow-circle-left"> تأكيد الطلب</i></button>
                        </div>
                    </form>
                </div>            
                {{--  --}}
        </div>    
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->