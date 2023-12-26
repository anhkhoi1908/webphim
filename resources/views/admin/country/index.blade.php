@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Active/None</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)
                    <tr>
                      <th scope="row">{{$key}}</th>
                      <td>{{$cate->title}}</td>
                      <td>{{$cate->description}}</td>
                      <td>{{$cate->slug}}</td>
                      <td>
                        @if ($cate->status)
                            Active
                        @else 
                            None
                        @endif
                      </td>
                      <td>
                        <a href="{{route('country.edit', $cate->id)}}" class="btn btn-warning">Edit</a>
                        {!! Form::open([
                            'method'=>'DELETE', 
                            'route'=>['country.destroy', $cate->id], 
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
