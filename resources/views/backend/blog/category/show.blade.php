@extends('layouts.app')

@section('content')
    <div class="wrapper blog-details">
        <h1>Category added by {{ Auth::User()->name }}</h1>
        <p class="name">Name : {{ $category->name }}</p>

        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete Category</button>
        </form>
    </div>
    <a href="{{ route('category.index') }}" class="back"> Back to all Categories </a>
@endsection
