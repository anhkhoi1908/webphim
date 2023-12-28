@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('country.create')}}" class="btn btn-primary my-5">Add new</a>
            <table id="tablecountry" class="table pt-5 mb-5">
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
                      <td class="d-flex">
                        <a href="{{route('country.edit', $cate->id)}}" class="btn btn-warning" style="margin-right: 0.5rem">Edit</a>
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
