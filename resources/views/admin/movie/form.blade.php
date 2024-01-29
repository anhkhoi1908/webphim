@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!isset($movie))
                        {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class'=>'form-control','placeholders'=>'...', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eps', 'Episode', []) !!}
                            {!! Form::text('eps', isset($movie) ? $movie->eps : '', ['class'=>'form-control','placeholders'=>'...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class'=>'form-control','placeholders'=>'...', 'id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('time', 'Time', []) !!}
                            {!! Form::text('time', isset($movie) ? $movie->time : '', ['class'=>'form-control','placeholders'=>'...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class'=>'form-control','placeholders'=>'...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class'=>'form-control','placeholders'=>'...', 'id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'tags', []) !!}
                            {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['class'=>'form-control','placeholders'=>'...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'None'], isset($movie) ? $movie->status: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Resolution', []) !!}
                            {!! Form::select('resolution', ['0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Coming soon'], isset($movie) ? $movie->resolution: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtitle', 'Subtitle', []) !!}
                            {!! Form::select('subtitle', ['0'=>'Vietsub','1'=>'Lồng tiếng','2'=>'Thuyết minh','3'=>'Trailer'], isset($movie) ? $movie->subtitle: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Category', 'Category', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre', 'Genre', []) !!}<br>
                            @foreach($list_genre as $key => $gen) 
                                @if(isset($movie))
                                    {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                                @else
                                    {!! Form::checkbox('genre[]', $gen->id, '') !!}
                                     
                                @endif
                                {!! Form::label('genre', $gen->title) !!}
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('Country', 'Country', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Hot', 'Hot', []) !!}
                            {!! Form::select('hot', ['1'=>'Có','0'=>'Không'], isset($movie) ? $movie->hot: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Coming', 'Coming', []) !!}
                            {!! Form::select('coming', ['1'=>'Có','0'=>'Không'], isset($movie) ? $movie->coming: '', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Actor', 'Actor', []) !!}
                            {!! Form::text('actor', isset($movie) ? $movie->actor : '', ['class'=>'form-control','placeholders'=>'...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Image', []) !!}
                            {!! Form::file('image', ['class'=>'form-control-file']) !!}

                            @if(!empty($movie))
                                <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                            @endif
                        </div>

                    @if(!isset($movie))
                        {!! Form::submit('Thêm', ['class'=>'btn btn-success']) !!}
                    @else 
                        {!! Form::submit('Cập nhật', ['class'=>'btn btn-success']) !!}
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
