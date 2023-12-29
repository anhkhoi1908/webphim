 <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
   <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
         <div class="section-title"><span>Top View</span></div>      
      </div>
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#day" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
        </li>
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#week" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
        </li>
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#month" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
        </li>
      </ul>
      {{-- <div id="halim-ajax-popular-post" class="popular-post">
         <span id="show_default"></span>
      </div> --}}
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="day" role="tabpanel" aria-labelledby="pills-home-tab">
         <div id="halim-ajax-popular-post" class="popular-post">
            <span id="show_day0"></span>
          </div>
        </div>
        <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="pills-profile-tab">
         <div id="halim-ajax-popular-post" class="popular-post">
            <span id="show_day1"></span>
          </div>
        </div>
        <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="pills-contact-tab">
         <div id="halim-ajax-popular-post" class="popular-post">
            <span id="show_day2"></span>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
   </div>
</aside>