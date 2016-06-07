@extends('layouts.app')

@section('content')
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
<section id="aa-slider">
    <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      @foreach($data as $key => $news)
      @if($key == 0)
      <div class="item active">
        <img src="{{ url('image/'.$news->image) }}" alt="Chania" style="width: 50%; height: 300px;">
      <!--   <div class="carousel-caption">
          <h3>{{ $news->title }}</h3>
          <p><?php echo substr("$news->content", 0,100);?>... </p>
        </div> -->
      </div>
      @else
      <div class="item">
        <img src="{{ url('image/'.$news->image) }}" alt="Chania" style="width: 50%; height: 300px;">
       <!--  <div class="carousel-caption">
          <h3>{{ $news->title }}</h3>
          <p><?php echo substr("$news->content", 0,100);?>... </p>
        </div> -->
      </div>
    
      @endif
                                
      @endforeach
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</section>
  <!-- / slider -->

<!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">

        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach($data1 as $key => $product)
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
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
                                                       
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
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price"></span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p></p>
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
            
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              @foreach($data2 as $merk)
              <ul class="aa-catg-nav">
                <li><a href="#"><span class="fa fa-gear pull-center"></span> &nbsp{{ $merk->merk }}</a></li>
              </ul>
              @endforeach
            </div>
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
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-product-details-area">
      <!-- Related product -->
            <div class="aa-product-related-item">
   

              <h3>Kopling</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($data3 as $product)
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="{{ url('image1/'.$product->image1) }}" style="max-width: 100%;height: 300px;" alt="polo shirt img"></a>

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
            </div>
            </div>
            </div>
            </div>
            </section>

  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-product-details-area">
      <!-- Related product -->
            <div class="aa-product-related-item">
   

              <h3>Vgrill</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($data4 as $product)
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="{{ url('image1/'.$product->image1) }}" style="max-width: 100%;height: 300px;" alt="polo shirt img"></a>

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
            </div>
            </div>
            </div>
            </div>
            </section>

 
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  
@endsection
