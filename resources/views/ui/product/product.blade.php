      
@extends('layouts.app')

@section('content')

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="css1/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
         @foreach($data4 as $key => $master)   
        <h2>{{$master->name}}</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>  
              
          <li class="active">{{$master->name}}</li>

        </ol>
        @endforeach
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach($data as $key => $product)
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="{{ url('image1/'.$product->image1) }}" style="max-width: 100%; height: 300px;" alt="polo shirt img"></a>

                     <form action="{{url('/savecart')}}" method="post" enctype="multipart/form-data" / >
                      {!! csrf_field() !!}
                       <input type="hidden" name="id" value="{{$product->id}}">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input type="hidden" name="codeproduct" value="{{$product->code}}">
                       <input type="hidden" name="codemerk" value="{{$product->codemerk}}">
                       <input type="hidden" name="codejenis" value="{{$product->codejenis}}">
                       <input type="hidden" name="jenis" value="{{$product->jenis}}">
                       <input type="hidden" name="b" value="{{$product->b}}">
                       <input type="hidden" name="image1" value="{{$product->image1}}">
                       <input type="hidden" name="price" value="{{$product->price}}">
                       <input type="hidden" name="desc" value="{{$product->desc}}">
                       <input type="hidden" name="total" value="{{$product->price}}">
                       <input type="hidden" name="subtotal" value="{{$product->price}}">
                       

                    <button class="aa-add-card-btn" type="submit"><span class="fa fa-shopping-cart"></span>Add To Cart</button>

                      </form>

                    <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{$product->desc}}</a></h4>
                      <span class="aa-product-price">Rp.{{$product->price}},-</span>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="{{ url('detail/product/'.$product->id) }}" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <!-- <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                </li>
                @endforeach
                <!-- start single product item -->
                                                        
              </ul>
              
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              
            
                  <ul class="pagination">
                    {!! $data->render() !!}
                  </ul>
              
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              @foreach($data3 as $merk)
              <ul class="aa-catg-nav">
                <li><a href="#"><span class="fa fa-gear pull-center"></span> &nbsp{{ $merk->merk }}</a></li>
              </ul>
              @endforeach
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
              @foreach($data5 as $key => $master)   
                <a href="{{ $master->name }}">{{$master->name}}</a>
                @endforeach
              </div>
            </div>
        
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->

@endsection