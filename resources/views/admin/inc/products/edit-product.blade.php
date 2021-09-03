<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تعديل منتج
        <small>تعديل منتج معين</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل منتج</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="container-fliud">
        <div class="row">
          <div class="col-lg-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">تعديل منتج</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.product.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="box-body">
                  <div class="form-group col-lg-4 {{$errors->has('name')? 'has-error':''}}">
                    <label for="name">إسم المنتج</label>
                    <input type="text" class="form-control" name="name" id="product_name" placeholder="اسم المنتج" value="@if(old('name')){{old('name')}}@else{{$product->name}}@endif">
                    @if($errors->has('name'))
                    <span class="help-block">
                    {{ $errors->first('name')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_brand')? 'has-error':''}}">
                    <label for="product_brand">العلامة التجارية</label>
                    <select class="form-control" name="product_brand">
                      <option value="1" @if(old('product_brand')==1 || $product->brand_id==1){{'selected'}}@endif>بدون علامة تجارية</option>
                      @foreach ($brands as $brand)
                          <option value="{{$brand->id}}" @if(old('product_brand')==$brand->id || $product->brand_id==$brand->id) {{'selected'}} @endif>{{$brand->name}}</option>
                      @endforeach                
                    </select>              
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_supplier')? 'has-error':''}}">
                    <label for="product_supplier">المزود</label>
                    <select class="form-control" name="product_supplier">
                      <option value="1" @if(old('product_supplier')==1 || $product->supplier_id==1){{'selected'}}@endif>لا مزود</option>
                      @foreach ($suppliers as $supplier)
                          <option value="{{$supplier->id}}" @if(old('product_supplier')==$supplier->id || $product->supplier->id=$supplier->id) selected @endif>{{$supplier->name}}</option>
                      @endforeach                
                    </select>              
                  </div>
                  <div class="form-group {{$errors->has('product_short_description')? 'has-error':''}}">
                    <label for="product_short_description">وصف مختصر للمنتج</label>
                    <textarea class="form-control" name="product_short_description" id="short_description" cols="30" rows="3" placeholder="وصف مختصر للمنتج">@if(old('product_short_description')){{old('product_short_description')}}@else{{$product->short_description}}@endif</textarea>            
                    @if($errors->has('product_short_description'))
                    <span class="help-block">
                    {{ $errors->first('product_short_description')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group {{$errors->has('product_long_description')? 'has-error':''}}">
                    <label for="product_long_description">وصف كامل للمنتج</label>
                    <textarea class="form-control" name="product_long_description" id="article-ckeditor" cols="30" rows="5" placeholder="وصف كامل للمنتج">@if(old('product_long_description')){{old('product_long_description')}}@else{{$product->long_description}}@endif</textarea>            
                    @if($errors->has('product_long_description'))
                    <span class="help-block">
                    {{ $errors->first('product_long_description')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_Purchasing_price')? 'has-error':''}}">
                    <label for="product_Purchasing_price">سعر المنتج (دج)</label>
                    <input type="number" class="form-control" name="product_Purchasing_price" id="product_Purchasing_price" placeholder="تكلفة المنتج بالدينار الجزائري" value="@if(old('product_Purchasing_price')){{old('product_Purchasing_price')}}@else{{$product->Purchasing_price}}@endif">
                    @if($errors->has('product_Purchasing_price'))
                    <span class="help-block">
                    {{ $errors->first('product_Purchasing_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_to_magazin_price')? 'has-error':''}}">
                    <label for="product_to_magazin_price">تكلفة التوصيل لمخازننا (دج)</label>
                    <input type="number" class="form-control" name="product_to_magazin_price" id="product_to_magazin_price" placeholder="تكلفة توصيل المنتج إلى مخازننا بالدينار الجزائري" value="@if(old('product_to_magazin_price')){{old('product_to_magazin_price')}}@else{{$product->to_magazin_price}}@endif">
                    @if($errors->has('product_to_magazin_price'))
                    <span class="help-block">
                    {{ $errors->first('product_to_magazin_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_to_consumer_price')? 'has-error':''}}">
                    <label for="product_to_consumer_price">تكلفة التوصيل للزبون (دج)</label>
                    <input type="number" class="form-control" name="product_to_consumer_price" id="product_to_consumer_price" placeholder="تكلفة توصيل المنتج إلى الزبون بالدينار الجزائري" value="@if(old('product_to_consumer_price')){{old('product_to_consumer_price')}}@else{{$product->to_consumer_price}}@endif">
                    @if($errors->has('product_to_consumer_price'))
                    <span class="help-block">
                    {{ $errors->first('product_to_consumer_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_ombalage_price')? 'has-error':''}}">
                    <label for="product_ombalage_price">تكلفة التغليف (دج)</label>
                    <input type="number" class="form-control" name="product_ombalage_price" id="product_ombalage_price" placeholder="تكلفة تغليف المنتج  بالدينار الجزائري" value="@if(old('product_ombalage_price')){{old('product_ombalage_price')}}@else{{$product->ombalage_price}}@endif">
                    @if($errors->has('product_ombalage_price'))
                    <span class="help-block">
                    {{ $errors->first('product_ombalage_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_adds_price')? 'has-error':''}}">
                    <label for="product_adds_price"> تكلفة الإعلان للمنتج (دج)</label>
                    <input type="number" class="form-control" name="product_adds_price" id="product_adds_price" placeholder="سعر إعلان المنتج بالدينار الجزائري" value="@if(old('product_adds_price')){{old('product_adds_price')}}@else{{$product->adds_price}}@endif">
                    @if($errors->has('product_adds_price'))
                    <span class="help-block">
                    {{ $errors->first('product_adds_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_global_price')? 'has-error':''}}">
                    <label for="product_global_price"> التكلفة الإجمالية للمنتج (دج)</label>
                    <input type="text" class="form-control" disabled="disabled" name="product_global_price" id="product_global_price" placeholder="0" value="{{old('product_global_price')}}">
                    @if($errors->has('product_global_price'))
                    <span class="help-block">
                    {{ $errors->first('product_global_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_selling_price')? 'has-error':''}}">
                    <label for="product_selling_price"> تسعيرة المنتج (دج)</label>
                    <input type="number" class="form-control" name="product_selling_price" id="product_selling_price" placeholder="سعر المنتج بالدينار الجزائري" value="@if(old('product_selling_price')){{old('product_selling_price')}}@else{{$product->selling_price}}@endif">
                    @if($errors->has('product_selling_price'))
                    <span class="help-block">
                    {{ $errors->first('product_selling_price')}}
                    </span>
                    @endif
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_qty')? 'has-error':''}}">
                    <label for="product_qty"> الكمية</label>
                    <input type="number" class="form-control" name="product_qty" id="product_qty" placeholder="أكتب الكمية" value="@if(old('product_qty')){{old('product_qty')}}@else{{$product->qty}}@endif">
                    @if($errors->has('product_qty'))
                    <span class="help-block">
                    {{ $errors->first('product_qty')}}
                    </span>
                    @endif
                  </div>
                  {{-- <div class="form-group col-lg-4 {{$errors->has('product_category')? 'has-error':''}}">
                    <label for="product_category">الصنف</label>
                    <select class="form-control" name="product_category" id="product_category">
                      <option value="1">إختر الصنف</option>
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}" @if(old('product_category')==$category->id) selected @endif>{{$category->name}}</option>
                      @endforeach                
                    </select>              
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_sub_category')? 'has-error':''}}">
                    <label for="product_sub_category1">تحت الصنف</label>
                    <select class="form-control" name="product_sub_category" id="product_sub_category">
                      <option value="1">إختر تحت الصنف</option>
                    </select>              
                  </div>
                  <div class="form-group col-lg-4 {{$errors->has('product_sub_sub_category')? 'has-error':''}}">
                    <label for="product_sub_sub_category">تحت تحت الصنف</label>
                    <select class="form-control" name="product_sub_sub_category" id="product_sub_sub_category">
                      <option value="1">إختر تحت تحت الصنف</option>               
                    </select>              
                  </div> --}}
                  {{-- <div class="form-group col-lg-4 {{$errors->has('product_image')? 'has-error':''}}">
                    <label for="product_image">صورة المنتج الرئيسية ( 360x555)</label>
                    <input type="file" name="product_image" id="product_image">
                    @if($errors->has('product_image'))
                    <span class="help-block">
                      {{$errors->first('product_image')}}
                    </span>
                    @endif
                  </div>             --}}
                </div><!-- /.box-body --> 
                
                <div class="box-footer"></div>
                {{-- <div class="box-footer">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </form> --}}
            </div>      
          </div>
          <!---->          
          <div class="col-lg-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"></h3>
              </div><!-- /.box-header -->
              <h4>منتج  مملوك أو دروب شبين</h4>
        <div classe="form-group">
          <select class="form-control" name="dropsheping">
              <option value="0" @if(old('dropsheping')==0 || $product->dropsheping==0){{'selected'}}@endif>منتج مملوك</option>
              <option value="1" @if(old('dropsheping')==1 || $product->dropsheping==1){{'selected'}}@endif>دروب شبين</option>
          </select>
        </div>
              <h4>حالة المنتج (مرئي أو مخفي)</h4>
        <div classe="form-group">
          <input type="checkbox" name="statu" value="1" @if($product->statu==1){{'checked'}}@endif> مرئي
        </div>
              <h4>تعديل الصورة الرئيسية</h4>
              <div class="form-group {{$errors->has('product_image')? 'has-error':''}}">
                <label for="product_image">صورة المنتج الرئيسية ( 360x555)</label>
                <input type="file" name="product_image" id="product_image">
                @if($errors->has('product_image'))
                <span class="help-block">
                  {{$errors->first('product_image')}}
                </span>
                @endif
              </div>
              <div class="">
                <img src="{{url('/admin-css/uploads/images/products/'.$product->image)}}" width="100%">
              </div>
              <h4>الأقسام</h4> 
              <hr>
              <div class="form-group">
              <ul class="list-unstyled" style="padding-right:15px !important;">
              @foreach($categories as $Cat)
                <li><input type="checkbox" name="category_id[{{$Cat->id}}]" onclick="show_sub_category_checkboxs({{$Cat->id}})" value="{{$Cat->id}}" @if(is_product_has_this_cat($product->id,$Cat->id)){{'checked'}}@endif> {{$Cat->name}}            
                  @if(has_sub_categories($Cat->id))
                  <ul class="list-unstyled" id="sub_category_list_checkbox_{{$Cat->id}}" style="padding-right:15px !important;@if(!is_product_has_this_cat($product->id,$Cat->id))display:none;@endif">
                    @foreach($Cat->sub_categories as $Sub_Cat)
                    <li><input class="sub_category_{{$Cat->id}}" type="checkbox" name="sub_category_id[{{$Sub_Cat->id}}]" onclick="show_sub_sub_category_checkboxs({{$Sub_Cat->id}})" value="{{$Sub_Cat->id}}" @if(is_product_has_this_sub_cat($product->id,$Sub_Cat->id)){{'checked'}}@endif> {{$Sub_Cat->name}}
                         @if(has_sub_sub_categories($Sub_Cat->id))
                        <ul class="list-unstyled" id="sub_sub_category_list_checkbox_{{$Sub_Cat->id}}" style="padding-right:15px !important;@if(!is_product_has_this_sub_cat($product->id,$Sub_Cat->id))display:none;@endif">
                          @foreach(get_sub_sub_categories($Sub_Cat->id) as $Sub_Sub_Cat)
                          <li><input class="sub_sub_category_{{$Cat->id}}" type="checkbox" name="sub_sub_category_id[{{$Sub_Sub_Cat->id}}]" value="{{$Sub_Sub_Cat->id}}" @if(is_product_has_this_sub_sub_cat($product->id,$Sub_Sub_Cat->id)){{'checked'}}@endif> {{$Sub_Sub_Cat->name}}</li>
                          @endforeach
                        </ul>
                        @endif 
                    </li>
                    @endforeach
                  </ul>
                  @endif
                 
                </li>
              @endforeach
              </ul>
              </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
          </form>
          </div><!-- /.box-body -->
          <!---->    
        </div>
      </div>
      <!-- End Your Page Content Here -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->