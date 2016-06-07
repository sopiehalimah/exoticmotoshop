 @extends('layouts.app')

@section('content')



  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">                        
                    <h2><a href="#">{{ $data->title }}</a></h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-author">
                        Posted By <a href="#">{{ App\User::find($data->id_admin)['name'] }}</a>
                      </div>
                      <div class="aa-post-date">
                       <i class="fa fa-calendar"></i>&nbsp {{ date_format(date_create($data->created_at),"D, h M Y") }}
                      </div>
                    </div>
                    <figure class="aa-blog-img">
                      <a href="#"><img src="{{ url('image/'.$data->image) }}" alt="fashion img"></a>
                    </figure>
                    <p><?php echo $data->content; ?></p>
                    
                    <div class="blog-single-bottom">
                      <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class="blog-single-tag">
                            <span>Tags:</span>
                            <a href="#">Fashion,</a>
                            <a href="#">Beauty,</a>
                            <a href="#">Lifestyle</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-single-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </article>
                  <!-- blog navigation -->
                  <div class="aa-blog-navigation">
                    <a class="aa-blog-prev" href="#"><span class="fa fa-arrow-left"></span>Prev Post</a>
                    <a class="aa-blog-next" href="#">Next Post<span class="fa fa-arrow-right"></span></a>
                  </div>
                  <!-- Blog Comment threats -->
                  <div class="aa-blog-comment-threat">
                    <h3>Comments (4)</h3>
                    <div class="comments">
                      <ul class="commentlist">
                      @foreach($data1 as $respon)
                      @if($respon->id_news == $data->id)
                        <li>
                          <div class="media">
                            <div class="media-left">    
                                <img class="media-object news-img" src="/css1/img/testimonial-img-3.jpg" alt="img">      
                            </div>
                            <div class="media-body">
                             <h4 class="author-name">{{$respon->name}}</h4>
                             <span class="comments-date"> {{ date_format(date_create($respon->created_at),"D, h M Y") }}</span>
                             <p><?php echo $respon->comment; ?></p>



                             <div class="col-sm-12">
                             <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Replay</a>
                                </h4>
                              </div>
                              <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <form>
                                    <!-- <div class="col-sm-8"> -->
                                      <div class="col-sm-4">
                                      <p>
                                        <label for="author">Name <span class="required">*</span></label>
                                        <input class="ipt" type="text"  name="name" required>
                                      </p>
                                      <p>
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input class="ipt" type="email" name="email" required>
                                      </p>
                                      </div>
                                      <div class="col-sm-8">
                                         <p>
                                        <label for="comment">Comment <span class="required">*</span></label>
                                        <textarea class="ipt" name="comment"></textarea>
                                        </p>
                                        <p>
                                           <input type="submit" name="submit" class="ipt-btn" value="Replay">
                                        </p>
                                      </div>
                                    <!-- </div> -->
                                  </form>
                                </div>
                              </div>
                            </div>

                            </div>
                          </div>
                          </div>
                          </div>
                          
                        </li>
                        @endif
                        @endforeach 
                        
                      </ul>
                    </div>
                    <div class="aa-blog-archive-pagination">
                      <nav>
                        <ul class="pagination">
                          {!! $data1->render() !!}
                        </ul>
                      </nav>
                    </div>
                  </div>
                  <!-- blog comments form -->
                  <div id="respond">
                    <h3 class="reply-title">Leave a Comment</h3>
                    <form id="commentform" action="{{ url('/response') }}" method="POST" enctype="multipart/form-data">
                     {!! csrf_field() !!}
                     <!-- <div class="col-sm-8"> -->
                     <div class="col-sm-4">
                      <p class="comment-notes">
                        Your email address will not be published. Required fields are marked <span class="required">*</span>
                      </p>
                      <p class="comment-form-author">
                        <label for="author">Name <span class="required">*</span></label>
                        <input type="text" name="name" value="" size="30" required="required">
                        <input type="hidden" name="id_news" value="{{$data->id}}">
                      </p>
                      <p class="comment-form-email">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" name="email" value="" aria-required="true" required="required">
                      </p>
                      </div>
                      <div class="col-sm-8">
                      <p class="comment-form-comment">
                        <label for="comment">Comment</label>
                        <textarea name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea>
                      </p>
                      <p class="form-submit">
                        <input type="submit" name="submit" class="aa-browse-btn" value="Post Comment">
                      </p>  
                      </div>
                      <!-- </div>       -->
                    </form>
                  </div>
                </div>
              </div>

              <!-- blog sidebar -->
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Category</h3>
                    @foreach($data3 as $merk)
                    <ul class="aa-catg-nav">
                      <li><a href="#"><span class="fa fa-gear pull-center"></span> &nbsp{{ $merk->merk }}</a></li>
                    </ul>
                    @endforeach
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Tags</h3>
                    <div class="tag-cloud">
                      <a href="#">Fashion</a>
                      <a href="#">Ecommerce</a>
                      <a href="#">Shop</a>
                      <a href="#">Hand Bag</a>
                      <a href="#">Laptop</a>
                      <a href="#">Head Phone</a>
                      <a href="#">Pen Drive</a>
                    </div>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Recent Post</h3>
                    <div class="aa-recently-views">
                      <ul>
                         @foreach ($data2 as $recent)
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="{{ url('image/'.$recent->image) }}" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">{{$recent->title}}</a></h4>
                            <p><i class="fa fa-calendar"></i>&nbsp{{ date_format(date_create($recent->created_at),"D, h M Y") }}</p>
                          </div>                    
                        </li>
                        @endforeach                                
                      </ul>
                    </div>                            
                  </div>
                </aside>
              </div>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->


@endsection