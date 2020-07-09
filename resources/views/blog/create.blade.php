@extends('layouts.app')

@section('create')
    <div class="create">
        <img src="/img/bg.png" alt="background">
        <div class="create-content">
    <div class="wrapper contact" >
        <h2>Get in touch</h2>
        <hr color="white">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <label for="name">Your name:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">E-mail Address:</label>
            <input type="text" name="email" id="email" required>
            <label for="type">Choose type of programmer/coder you want to contact:</label>
            <select name="type" id="type">
                <option value="app-developer">Application Developer</option>
                <option value="front-end">Front-End Developer</option>
                <option value="back-end">Back end Developer</option>
                <option value="full-web-developer">Full Web Developer</option>
            </select>
            <label for="base">Choose developer level:</label>
            <select name="base" id="base">
                <option value="Basic">Basic</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
            <fieldset>
                <label>Choose type of look you wish:</label>
                <input type="checkbox" name="design[]" value="Interactive">Interactive
                <input type="checkbox" name="design[]" value="Simple">Simple
                <input type="checkbox" name="design[]" value="Attractive">Attractive
                <input type="checkbox" name="design[]" value="Abstract">Abstract <br/>
            </fieldset>
            <label for="body">Feedback :</label>
            <textarea placeholder="Feedback / Recommendation" name="body" required rows="1" cols="50"></textarea>
            <br/>
            <input type="submit" value="SUBMIT">
        </form>
    </div>
        </div>
    </div>

@endsection
