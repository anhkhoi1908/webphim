@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary my-5">Add new</a>
            <table id="tablemovie" class="table pt-5 mb-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Tags</th> 
                    <th scope="col">Image</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Coming</th>
                    <th scope="col">Resolution</th>
                    <th scope="col">Time</th>
                    <th scope="col">Subtitle</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Slug</th>
                    <th scope="col">Active/None</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Actor</th>
                    <th scope="col">Trailer</th>
                    <th scope="col">CreateDate</th>
                    <th scope="col">UpdateDate</th>
                    <th scope="col">TopViews</th>
                    <th scope="col">Year</th>
                    <th scope="col">Season</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)
                    <tr>
                      <th scope="row">{{$key}}</th>
                      <td>{{$cate->title}}</td>
                      <td>{{$cate->tags}}</td>
                      <td><img width="50%" src="{{asset('uploads/movie/'.$cate->image)}}" alt=""></td>
                      <td>
                        @if($cate->hot==0)
                            Không
                        @else 
                            Có  
                        @endif
                      </td>
                      <td>
                        @if($cate->coming==0)
                            Không
                        @else 
                            Có  
                        @endif
                      </td>
                      <td>
                        <span class="badge bg-success">
                          @if($cate->resolution==0)
                              HD
                          @elseif($cate->resolution==1) 
                              SD  
                          @elseif($cate->resolution==2) 
                              HDCam
                          @elseif($cate->resolution==3) 
                              Cam
                          @elseif($cate->resolution==4) 
                              FullHD
                          @elseif($cate->resolution==5) 
                              Coming soon
                          @endif
                          </span>
                      </td>
                      <td>{{$cate->time}}</td>
                      <td>
                        <span class="badge" style="background:red">
                          @if($cate->subtitle==0)
                              Vietsub
                          @elseif($cate->subtitle==1) 
                              Lồng tiếng
                          @elseif($cate->subtitle==2) 
                              Thuyết minh
                          @elseif($cate->subtitle==3) 
                              Trailer
                          @endif
                        </span>
                      </td>
                      {{-- <td>{{$cate->description}}</td> --}}
                      <td>{{$cate->slug}}</td>
                      <td>
                        <span class="badge bg-info">
                          @if ($cate->status)
                            Active
                          @else 
                            None  
                          @endif
                        </span>
                      </td>
                      <td>{{$cate->category->title}}</td>
                      <td>
                        @foreach($cate->movie_genre as $gen)
                          <span class="badge bg-dark rounded-pill">{{$gen->title}}</span>
                        @endforeach
                      </td>
                      <td>{{$cate->country->title}}</td>
                      <td>{{$cate->actor}}</td>
                      <td><span class="badge" style="background:purple">{{$cate->trailer}}</span></td>
                      <td>{{$cate->create_date}}</td>
                      <td>{{$cate->update_date}}</td>
                      <td>
                        {!! Form::select('topview', ['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=>'select-topview', 'id'=>$cate->id]) !!}
                      </td>
                      <td>
                        {!! Form::selectYear('year', 2000, 2023, isset($cate->year) ? $cate->year : '', ['class'=>'select-year', 'id'=>$cate->id]) !!}
                      </td>
                      <td>
                        {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', ['class'=>'select-season', 'id'=>$cate->id]) !!}
                      </td>
                      <td class="d-flex">
                        <a href="{{route('movie.edit', $cate->id)}}" class="btn btn-warning" style="margin-right: 0.5rem">Edit</a>
                        {!! Form::open([
                            'method'=>'DELETE', 
                            'route'=>['movie.destroy', $cate->id], 
                            'onsubmit'=>'return confirm("Bạn có thật sự muốn xóa?")'
                        ]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
