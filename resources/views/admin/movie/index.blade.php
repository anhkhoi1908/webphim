@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary my-5">Add new</a>
            <table id="tablemovie" class="table pt-5 mb-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Resolution</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Slug</th>
                    <th scope="col">Active/None</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)
                    <tr>
                      <th scope="row">{{$key}}</th>
                      <td>{{$cate->title}}</td>
                      <td><img width="50%" src="{{asset('uploads/movie/'.$cate->image)}}" alt=""></td>
                      <td>
                        @if($cate->hot==0)
                            Không
                        @else 
                            Có  
                        @endif
                      </td>
                      <td>
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
                        @endif
                      </td>
                      {{-- <td>{{$cate->description}}</td> --}}
                      <td>{{$cate->slug}}</td>
                      <td>
                        @if ($cate->status)
                            Active
                        @else 
                            None  
                        @endif
                      </td>
                      <td>{{$cate->category->title}}</td>
                      <td>{{$cate->genre->title}}</td>
                      <td>{{$cate->country->title}}</td>
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
