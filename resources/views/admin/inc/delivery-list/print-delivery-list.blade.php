@extends('admin.layouts.invoice')
<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> {{store_name_value()}}
          <small class="pull-right">يوم:{{date('d-m-Y')}}</small>
        </h2>
      </div><!-- /.col -->
      <div class="col-xs-12 text-center">
        <h2 class="page-header">
            قائمة الطلبات الواجب تسليمها          
        </h2>
      </div><!-- /.col -->
    </div>
    
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>رقم الطلب</th>
              <th>إسم الزبون</th>
              <th>هاتف الزبون</th>
              <th>عنوان التسليم</th>
              <th>المبلغ المستحق</th>
            </tr>
          </thead>
          <tbody>
              @php
                  $global=0;
              @endphp
              @foreach ($orders as $index=>$order)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$order->id}}</td>
                <td>{{$order->billing_name}}</td>
                <td>{{$order->billing_mobile}}</td>
                <td>{{$order->billing_address}}</td>                
                <td>{{$order->total}}</td>
              </tr>      
              @php
                  $global=$global+$order->total;
              @endphp
              @endforeach                        
          </tbody>
        </table>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">تعليمات لموصل الطلبات:</p>            
          <ul class="list-unstyled text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <li><b>1.</b> الإتصال بالزبون و تحديد مكان التسليم</li>
              <li><b>2.</b> تسليم الطلب و إستلام المبلغ المستحق</li>
              <li><b>3.</b> في حالة تعذر تسليم الطلب يجب إعادة الطلب إلى المخزن في نهاية اليوم.</li>
          </ul>
        
      </div><!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">المبلغ المستحق ليوم:{{date('d-m-Y')}}</p>
        <div class="table-responsive">
          <table class="table">
            <tbody><tr>              
            <tr>
              <th>المبلغ المستحق:</th>
              <td>
                  @if ($global==0)
                  {{'0.00'}}
                  @else
                  {{$global}}
                  @endif                  
                  د.ج
                </td>
            </tr>
          </tbody></table>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    
  </section>