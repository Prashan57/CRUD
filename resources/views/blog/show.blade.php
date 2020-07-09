@extends('layouts.app')

@section('content')
    <div class="wrapper blog-details">
        <h1>Wish list of {{ $blog->name }}</h1>
        <p class="type">Type - {{ $blog->type }}</p>
        <p class="type">E-mail - {{ $blog->email }}</p>
        <p class="base">Base - {{ $blog->base }}</p>
        <p class="design">Extra:</p>
        <ul>
            @if($blog->design!=null)
            @foreach($blog->design as $designs)
                <li>{{ $designs }}</li>
            @endforeach
            @else
                <p>NOT FILLED</p>
            @endif
        </ul>
        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete Data</button>
        </form>
    </div>
    <a href="{{ route('blog.index') }}" class="back"><- Back to all Submitters</a>
@endsection
