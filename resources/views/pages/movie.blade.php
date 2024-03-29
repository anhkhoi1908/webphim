@extends('layout')
@section('content')

<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-10">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category', $movie->category->slug)}}">
                  {{$movie->category->title}}</a>  »  <span><a href="{{route('country', $movie->country->slug)}}">
                     {{$movie->country->title}}</a>  »  
                     @foreach($movie->movie_genre as $gen)
                       <a href="{{route('genre', $gen->slug)}}">{{$gen->title}}</a> »
                     @endforeach  
                     <span class="breadcrumb_last" aria-current="page">{{$movie->title}}
                     </span></span></span></span></span>
                </div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8" style="margin-top: 2rem; border-right: 1px solid #333">
       <section id="content" class="test">
          <div class="clearfix wrap-content">
             <div class="halim-movie-wrapper">
                {{-- <div class="title-block">
                   <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                      <div class="halim-pulse-ring"></div>
                   </div>
                   <div class="title-wrapper" style="font-weight: bold;">
                      Bookmark
                   </div>
                </div> --}}
                <div class="movie_info col-xs-12">
                   <div class="movie-poster col-md-3">
                      <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}">
                      @if($movie->resolution!=5)
                      <div class="bwa-content">
                         <div class="loader"></div>
                         <a href="{{route('watch')}}" class="bwac-btn">
                         <i class="fa fa-play"></i>
                         </a>
                      </div>
                      @else
                        <a href="#watch_trailer" class="watch_trailer btn" style="position: absolute; left: 0; top: 0; background: red; color: #fff;  border-radius: 0 !important">
                           Xem Trailer
                        </a>
                      @endif

                   </div>
                   <div class="film-poster col-md-9">
                      <h1 class="movie-title title-1" style="display:block;line-height:35px;color: #fff;text-transform: uppercase;font-size: 24px; font-weight: bold">{{$movie->title}}</h1>
                      {{-- <h2 class="movie-title title-2" style="font-size: 12px;">Black Widow (2021)</h2> --}}
                      <ul class="list-info-group">
                         <li class="list-info-group-item"><span>Trạng Thái</span> : 
                           <span class="quality">
                              @if($movie->resolution==0)
                            HD
                        @elseif($movie->resolution==1) 
                            SD  
                        @elseif($movie->resolution==2) 
                            HDCam
                        @elseif($movie->resolution==3) 
                            Cam
                        @elseif($movie->resolution==4) 
                            FullHD
                        @elseif($movie->resolution==5) 
                            Coming soon
                        @endif
                           </span><span class="episode">
                              @if($movie->subtitle==0)
                                 Vietsub
                              @elseif($movie->subtitle==1) 
                                 Lồng tiếng
                              @elseif($movie->subtitle==2) 
                                 Thuyết minh
                              @elseif($movie->subtitle==3) 
                                 Trailer
                              @endif
                           </span>
                         </li>
                         <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">7.2</span>
                         </li>
                         <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->time}}</li>
                         <li class="list-info-group-item"><span>Tập phim</span> : {{$movie->eps}}/{{$movie->eps}} - Hoàn thành</li>
                         <li class="list-info-group-item"><span>Danh mục</span> : 
                           <a href="{{route('category', $movie->category->slug)}}">{{$movie->category->title}}</a>
                         </li>
                         <li class="list-info-group-item"><span>Thể loại</span> : 
                           @foreach($movie->movie_genre as $gen)
                              <a href="{{route('genre', $gen->slug)}}">{{$gen->title}}, </a>
                           @endforeach
                         </li>
                         <li class="list-info-group-item"><span>Quốc gia</span> : 
                           <a href="{{route('country', $movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a>
                         </li>
                         <li class="list-info-group-item"><span>Diễn viên</span> : {{$movie->actor}}</li>
                         
                      </ul>
                      <div class="movie-trailer hidden"></div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
             <div id="halim_trailer"></div>
             <div class="clearfix"></div>
             <div class="section-heading" style="margin-bottom:0.5rem">
                <a href="danhmuc.php" title="Phim Bộ">
                  <span class="h-text" style="">Nội Dung</span>
               </a>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                   <article id="post-38424" class="item-content">
                      {{$movie->description}}
                     </article>
                  </div>
               </div>
               {{-- <div class="section-heading">
                  <a href="danhmuc.php" title="Phim Bộ">
                     <span class="h-text" style="">Trailer Phim</span>
                  </a>
               </div> --}}
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <article id="watch_trailer" class="item-content">
                        <iframe width="100%" height="415" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                     </article>
                  </div>
               </div>
               {{-- <div class="section-heading">
                  <a href="danhmuc.php" title="Phim Bộ">
                     <span class="h-text" style="">Tags Phim</span>
                  </a>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <article id="post-38424" class="item-content">
                        @if($movie->tags!=NULL)
                        @php
                           $tags = array();
                           $tags = explode(',', $movie->tags);
                           // print_r($tags); 
                        @endphp
                        @foreach($tags as $key => $tag)
                           <a href="{{url('tag/'.$tag)}}">{{$tag}}</a>
                        @endforeach
                        @else
                           {{$movie->title}}
                           
                        @endif
                     </article>
                  </div>
               </div> --}}

               {{-- <div class="section-heading">
                  <a href="danhmuc.php" title="Phim Bộ">
                     <span class="h-text" style="">Bình Luận</span>
                  </a>
               </div> --}}
               <div class="entry-content htmlwrap clearfix" style="background: #fff">
                  <div class="video-item halim-entry-box">
                     @php
                        $current_url = Request::url();
                     @endphp
                     <article id="post-38424" class="item-content">
                        <div class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="10"></div>
                     </article>
                  </div>
               </div>
            </div>
       </section>
       <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider" style="padding: 0">
            <div class="section-heading">
               <a href="danhmuc.php" title="Phim Bộ">
                  <span class="h-text" style="">Có Thể Bạn Muốn Xem</span>
               </a>
            </div>
             <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
               @foreach($related as $key => $item)
               <article class="thumb grid-item post-38498">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('movie',$item->slug)}}" title="{{$item->title}}">
                        <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$item->image)}}" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                        <span class="status">
                           @if($item->resolution==0)
                            HD
                        @elseif($item->resolution==1) 
                            SD  
                        @elseif($item->resolution==2) 
                            HDCam
                        @elseif($item->resolution==3) 
                            Cam
                        @elseif($item->resolution==4) 
                            FullHD
                        @elseif($item->resolution==5) 
                            Coming soon
                        @endif
                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                           @if($item->subtitle==0)
                              Vietsub
                           @elseif($item->subtitle==1) 
                              Lồng tiếng
                           @elseif($item->subtitle==2) 
                              Thuyết minh
                           @elseif($item->subtitle==3) 
                              Trailer
                           @endif
                        </span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$item->title}}</p>
                              <p class="original_title">Monkey King: The One And Only</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
               
             </div>
             <script>
                $(document).ready(function($) {				
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
             </script>
          </div>
       </section>
    </main>
    @include('pages.include.sidebarhot')

</div>

@endsection