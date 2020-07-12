@extends('layouts.app')

@section('content')
    <div class="wrapper blog-details">
        <h1>Wish list of {{ Auth::User()->name }}</h1>
        <p class="type">Type : {{ $admin->type }}</p>
        <p class="head">Title : {{ $admin->title }}</p>
        <p class="reply">Replied To : {{ $admin->reply }}</p>
        <p class="body">Body /Content : {{ $admin->body }}</p>
        <p class="image">Image File : <br/>
            {{ $admin->file }}</p>

        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete Data</button>
        </form>
    </div>
    <a href="{{ route('admin') }}" class="back"><- Back to all Submitters</a>
@endsection
