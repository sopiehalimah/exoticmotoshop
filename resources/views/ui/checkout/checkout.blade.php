@extends('layouts.app')


@section('content')

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="css1/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="{{url('/savebilling')}}" method="post">
          {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                   
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="first_name" placeholder="First Name*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="last_name" placeholder="Last Name*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="email" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="phone" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="address" rows="3" placeholder="Address*"></textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select name="country">
                                  <option value="0">Select Your Country</option>
                                  <option value="1">Indonesia</option>
                                 
                                </select>
                              </div>                             
                            </div>  
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="city" placeholder="City / Town*">

                              </div>
                            </div>                          
                          </div>
                                                               
                        </div>
                      </div>
                    </div>
                
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                  @if(count($cart))
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
			          $grandtotal=0;
			          ?>
			           @foreach($cart as $key => $cart2)
                        <tr>
                          <td>{{ $cart[$key]['desc'] }}<strong> x  {{ $cart[$key]['b'] }}</strong></td>
                          <td>Rp.{{ $cart[$key]['price'] }},-</td>
                        </tr>
                        <?php
		                $grandtotal+=$cart[$key]['total'];
		                ?>

		                <!-- <form action="{{url('/savecheckout')}}" method="post"> -->
         				 {!! csrf_field() !!}
                  
		                  <input type="hidden" name="id" value="{{$cart[$key]['id']}}">
		                  <input type="hidden" name="codejenis_{{$cart[$key]['id']}}" value="{{ $cart[$key]['codejenis'] }}">
		                  <input type="hidden" name="jenis_{{$cart[$key]['id']}}" value="{{ $cart[$key]['jenis'] }}">
		                  <input type="hidden" name="codeproduct_{{$cart[$key]['id']}}" value="{{ $cart[$key]['codeproduct'] }}">
		                  <input type="hidden" name="desc_{{$cart[$key]['id']}}" value="{{ $cart[$key]['desc'] }}">
		                  <input type="hidden" name="b_{{$cart[$key]['id']}}" value="{{ $cart[$key]['b'] }}">
		                  <input type="hidden" name="price_{{$cart[$key]['id']}}" value="{{ $cart[$key]['price'] }}">
		                  <input type="hidden" name="total_{{$cart[$key]['id']}}" value="{{ $cart[$key]['total'] }}">
		                  <input type="hidden" name="image1_{{$cart[$key]['id']}}" value="{{ $cart[$key]['image1'] }}">
                  		
		                @endforeach
		                </tbody>
		                <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td>Rp.<?php echo $grandtotal ?>,-</td>
                          <input type="hidden" name="subtotal" value="{{ $grandtotal }}">
                        </tr>
                         <tr>
                          <th>Total</th>
                          <td>Rp.<?php echo $grandtotal ?>,-</td>
                        </tr>
                      </tfoot>
                    </table>
                    @endif
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <!-- <label for="cashdelivery"><input type="radio" id="cashdelivery" name="pay_method" checked> Cash on Delivery </label> -->
                    
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


@endsection
