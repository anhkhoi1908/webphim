@extends('layout')
@section('content')

<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <div id="halim_related_movies-2xx" class="wrap-slider">
      {{-- <div class="section-bar clearfix">
         <h3 class="section-title"><span>PHIM HOT</span></h3>
      </div> --}}

      <div class="section-heading">
         <a href="danhmuc.php" title="Phim Bộ">
            <span class="h-text" style="">Phim Mới Nổi Bật</span>
         </a>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme" style="padding-bottom: 3rem; border-bottom: 1px solid #333">
         @foreach($hot as $key => $item)
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

      <div class="section-heading">
         <a href="danhmuc.php" title="Phim Bộ">
            <span class="h-text" style="">Phim Sắp Công Chiếu</span>
         </a>
      </div>
      <div id="halim_related_movies-3" class="owl-carousel owl-theme" style="padding-bottom:3rem; border-bottom: 1px solid #333">
         @foreach($coming as $key => $item_coming)
         <article class="thumb grid-item post-38498">
            <div class="halim-item">
               <a class="halim-thumb" href="{{route('movie',$item_coming->slug)}}" title="{{$item_coming->title}}">
                  <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$item_coming->image)}}" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                  <span class="status status-coming">
                     @if($item_coming->resolution==0)
                            HD
                        @elseif($item_coming->resolution==1) 
                            SD  
                        @elseif($item_coming->resolution==2) 
                            HDCam
                        @elseif($item_coming->resolution==3) 
                            Cam
                        @elseif($item_coming->resolution==4) 
                            FullHD
                        @elseif($item_coming->resolution==5) 
                            Coming soon
                        @endif
                  </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                     @if($item_coming->subtitle==0)
                        Vietsub
                     @elseif($item_coming->subtitle==1) 
                        Lồng tiếng
                     @elseif($item_coming->subtitle==2) 
                        Thuyết minh
                     @elseif($item_coming->subtitle==3) 
                        Trailer
                     @endif
                  </span> 
                  <div class="icon_overlay"></div>
                  <div class="halim-post-title-box">
                     <div class="halim-post-title ">
                        <p class="entry-title">{{$item_coming->title}}</p>
                        <p class="original_title">Monkey King: The One And Only</p>
                     </div>
                  </div>
               </a>
            </div>
         </article>
         @endforeach
      </div>



      
   </div>
   
   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8" style="border-right: 1px solid #333">
     @foreach($category_home as $key => $cate_home)
      <section id="halim-advanced-widget-2">
         <div class="section-heading" style="display:flex;justify-content:space-between;align-items:center">
            <a href="" title="Phim Bộ">
               <span class="h-text" style="">{{$cate_home->title}}</span>
            </a>
            <a href="" style="z-index:10;color:#fff;">
               <span>Xem thêm</span>
               <i class="fa-solid fa-caret-right"></i>
            </a>
            {{-- <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category', $movie->category->slug)}}">
               {{$movie->category->title}}</a>  »  <span><a href="{{route('country', $movie->country->slug)}}">
                  {{$movie->country->title}}</a>  »  <span><a href="{{route('genre', $movie->genre->slug)}}">
                     {{$movie->genre->title}}</a>  »  <span class="breadcrumb_last" aria-current="page">{{$movie->title}}
                  </span></span></span></span></span>
             </div> --}}
         </div>
         <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
           @foreach($cate_home->movie->take(4) as $key => $mov)
             <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
               <div class="halim-item">
                  <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                     <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" title="{{($mov->title)}}"></figure>
                     <span class="status">
                        @if($mov->resolution==0)
                        HD
                    @elseif($mov->resolution==1) 
                        SD  
                    @elseif($mov->resolution==2) 
                        HDCam
                    @elseif($mov->resolution==3) 
                        Cam
                    @elseif($mov->resolution==4) 
                        FullHD
                    @elseif($mov->resolution==5) 
                        Coming soon
                    @endif
                     </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                       @if($mov->subtitle==0)
                          Vietsub
                       @elseif($mov->subtitle==1) 
                          Lồng tiếng
                       @elseif($mov->subtitle==2) 
                          Thuyết minh
                       @elseif($mov->subtitle==3) 
                          Trailer
                       @endif
                     </span> 
                     <div class="icon_overlay"></div>
                     <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                           <p class="entry-title">{{($mov->title)}}</p>
                           <p class="original_title">My Roommate Is a Gumiho</p>
                        </div>
                     </div>
                  </a>
               </div>
            </article>
           @endforeach
         </div>
      </section>
      <div class="clearfix"></div>
     @endforeach
   </main>
   @include('pages.include.sidebarhot')


</div>

@endsection