@extends('master')
@section('main_content')
    @foreach ($contents as $content)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $content->title }}</h3>
                    <h3>{!! $content->article !!}</h3>
                </div>
            </div>
        </div>
    @endforeach
@endsection
