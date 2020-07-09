@extends('layouts.app')

@section('content')
    <div class="wrapper blog-index">
        <h1 style="text-align: center"><u>Submitters</u></h1>
        <br/>
        @foreach($blog as $blogs)
            <div class="blog-item">
                <img src="/img/p-transparent-design-letter-1.png" alt="icon">
                <h4><a href="{{ route('blog.show', $blogs->id) }}">{{ $blogs->name }}</a></h4>
            </div>
        @endforeach
    </div>
@endsection
