@extends('layout')
@section('content')

<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Phim Thuộc Năm</a> » <span class="breadcrumb_last" aria-current="page">{{$year}}</span></span></span></div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section>
          {{-- <div class="section-bar clearfix">
             <h1 class="section-title"><span>Năm : {{$year}}</span></h1>
          </div> --}}
          <div class="section-heading">
            <a href="danhmuc.php" title="Phim Bộ">
               <span class="h-text" style="border-radius: 4px">Phim {{$year}}</span>
            </a>
         </div>
          <div class="halim_box">
            @foreach($movie as $key => $mov)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
               <div class="halim-item">
                  <a class="halim-thumb" href="{{route('movie', $mov->slug)}}">
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
          <div class="clearfix"></div>
          <div class="text-center">{!! $movie->links("pagination::bootstrap-4") !!}</div>
       </section>
    </main>
    @include('pages.include.sidebarhot')

</div>

@endsection