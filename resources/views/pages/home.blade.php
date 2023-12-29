@extends('layout')
@section('content')

<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
         <h3 class="section-title"><span>PHIM HOT</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
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
                     @endif
                  </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                     @if($item->subtitle==0)
                        Vietsub
                     @elseif($item->subtitle==1) 
                        Lồng tiếng
                     @elseif($item->subtitle==2) 
                        Thuyết minh
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
   </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      @foreach($category_home as $key => $cate_home)
       <section id="halim-advanced-widget-2">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Bộ">
             <span class="h-text">{{$cate_home->title}}</span>
             </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($cate_home->movie->take(4) as $key => $mov)
              <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                   <a class="halim-thumb" href="chitiet.php">
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
                        @endif
                      </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                        @if($mov->subtitle==0)
                           Vietsub
                        @elseif($mov->subtitle==1) 
                           Lồng tiếng
                        @elseif($mov->subtitle==2) 
                           Thuyết minh
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