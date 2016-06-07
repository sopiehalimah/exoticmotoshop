@extends('layouts.app')


@section('content')


 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="css1/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
              @if(count($cart))
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Produk</td>
              <td class="description"></td>
              <td class="price">price</td>
              <td class="quantity">Kuantitas</td>
              <td class="total">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
          <?php
          $grandtotal=0;
          ?>
           @foreach($cart as $key => $cart2)
            
            <tr>
           
              <td class="cart_product">
                <a href=""><img src="{{ url('image1/'.$cart[$key]['image1']) }}" style="max-width: 100%;height: 100px;"  alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $cart[$key]['desc'] }}</a></h4>
                <p>Kode: {{ $cart[$key]['codeproduct'] }}</p>
              </td>
              <td class="cart_price">
                <p>Rp.{{ $cart[$key]['price'] }},-</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                 <!-- <form action="{{url('/updatecart/'.$key)}}" method="post" >
                 {!! csrf_field() !!}
                  <input  type="number" name="qty" id="qty" onclick="tambahqty({{ $cart[$key]['price'] }})"> -->

                  <form action="{{url('/updatecart/'.$key)}}" oninput="total.value=parseInt(a.value)*parseInt(b.value)" method="post">
                    {!! csrf_field() !!}
                    
                  <input type="hidden" id="a" name="a" value="{{ $cart[$key]['price'] }}" >
                  
                  <input type="number" class="num" id="b" name="b" value="{{ $cart[$key]['b'] }}">
                    
                    
                   <!-- <br>  -->
                  <button class="num_ref" type="submit"><i class="fa fa-refresh"></i></button>
                  <input type="hidden" name="id" value="{{$cart[$key]['id']}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="codejenis" value="{{ $cart[$key]['codejenis'] }}">
                  <input type="hidden" name="jenis" value="{{ $cart[$key]['jenis'] }}">
                  <input type="hidden" name="codeproduct" value="{{ $cart[$key]['codeproduct'] }}">
                  <input type="hidden" name="desc" value="{{ $cart[$key]['desc'] }}">
                  <input type="hidden" name="price" value="{{ $cart[$key]['price'] }}">
                  <input type="hidden" name="image1" value="{{ $cart[$key]['image1'] }}">

                </div>
              </td>
              <td class="cart_total">
               
              <!--   <h5 id="total_nominal" name="total" value="{{ $cart[$key]['price'] }}" >Rp.{{ $cart[$key]['price'] }},-</h5> -->

                     <input id="total_nominal" type="hidden"  name="total" for="a b" value="{{ $cart[$key]['total'] }}">
                     <!-- <input type="submit"> -->
                     <p id="total_nominal" name="total" for="a b" value="{{ $cart[$key]['total'] }}">Rp.{{ $cart[$key]['total'] }},-</p>
                </form>
                
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{url('/hapuscart/'.$key)}}"><i class="fa fa-times"></i></a>
              </td>
               <?php
                $grandtotal+=$cart[$key]['total'];
                ?>
               <!--  <form action="{{url('/savecheckout')}}" method="post" enctype="multipart/form-data" / >
                  {!! csrf_field() !!}
                  <input type="hidden" name="id" value="{{$cart[$key]['id']}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="codejenis" value="{{ $cart[$key]['codejenis'] }}">
                  <input type="hidden" name="jenis" value="{{ $cart[$key]['jenis'] }}">
                  <input type="hidden" name="codeproduct" value="{{ $cart[$key]['codeproduct'] }}">
                  <input type="hidden" name="desc" value="{{ $cart[$key]['desc'] }}">
                  <input type="hidden" name="b" value="{{ $cart[$key]['b'] }}">
                  <input type="hidden" name="price" value="{{ $cart[$key]['price'] }}">
                  <input type="hidden" name="total" value="{{ $cart[$key]['total'] }}">
                  <input type="hidden" name="image1" value="{{ $cart[$key]['image1'] }}"> -->
            </tr>
           @endforeach
          </tbody>
        </table>
        
         @endif

                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>Rp.<?php echo $grandtotal ?>,-</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>Rp.<?php echo $grandtotal ?>,-</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{url('/checkout')}}" class="aa-cart-view-btn">Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@endsection


