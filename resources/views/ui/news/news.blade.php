@extends('layouts.app')

@section('content')



  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area aa-blog-archive-2">
            <div class="row">
              <div class="col-md-9">
                <div class="aa-blog-content">
                  <div class="row">
                  @foreach ($data as $news)
                    <div class="col-md-4 col-sm-4">
                      <article class="aa-latest-blog-single">
                        <figure class="aa-blog-img">                    
                          <a href="#"><img alt="img" src="{{ url('image/'.$news->image) }}"></a>  
                            <figcaption class="aa-blog-img-caption">
                            <span href="#"><i class="fa fa-calendar"></i>{{ date_format(date_create($news->created_at)," H:i:s") }}</span>
                             <span href="#"><i class="fa fa-clock-o"></i>{{ date_format(date_create($news->created_at),"D, h M Y") }}</span>
                          </figcaption>                          
                        </figure>
                        <div class="aa-blog-info">
                          <h3 class="aa-blog-title"><a href="#">{{ $news->title }}</a></h3>
                          <p><?php echo substr("$news->content", 0,200);?>...</p> 
                          <a class="aa-read-mor-btn" href="{{ url('detail/news/'.$news->slug) }}">Read more <span class="fa fa-long-arrow-right"></span></a>
                        </div>
                      </article>
                    </div>
                    @endforeach
                   
                  
                                
                  </div>
                </div>
                <!-- Blog Pagination -->
                <div class="aa-blog-archive-pagination">
                  
                    <ul class="pagination">
                      {!! $data->render() !!}
                    </ul>
                  
                </div>
              </div>
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
                      @foreach ($data1 as $recent)
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
