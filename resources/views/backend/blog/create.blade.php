@extends('layouts.backend.dashboard')

@section('title',"Blog | Add New Post")

@section('content')
    <!-- Form Styling -->
    <link rel="stylesheet" href="/backend/css/from.css">
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Add new post</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Add new</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body ">
                            {{--
                            {!! Form::model($admins ?? '',["method"=>"POST","route"=>"admin.store","files"=>TRUE]) !!}
                            <div class="form-group">
                                {!! Form::label("category_id","Category") !!}
                                {!! Form::select("category_id",App\blog::pluck("id"),null,["class" => "form-control","placeholder"=>"Choose category" ]) !!}
                            </div>
                                <div class="form-group {{ $errors->has("title")?"has-error": '' }}">
                                     {!! Form::label("Title") !!}
                                     {!! Form::text("title",null,["class" => "form-control" ]) !!}
                                    @if($errors->has("title"))
                                        <span class="help-block"> {{ $errors->first("title") }}</span>
                                        @endif
                                </div>

                            <div class="form-group {{ $errors->has("body")?"has-error": '' }}">
                                {!! Form::label("body","Body/Content") !!}
                                {!! Form::textarea("body",null,["class" => "form-control" ]) !!}
                                @if($errors->has("body"))
                                    <span class="help-block"> {{ $errors->first("body") }}</span>
                                @endif
                            </div>
                             <div class="form-group {{ $errors->has("image")?"has-error": '' }}">
                                 {!! Form::label("image","Feature Image") !!}
                                 {!! Form::file("image",null,["class"=>"btn btn-primary"]) !!}
                                 @if($errors->has("image"))
                                     <span class="help-block"> {{ $errors->first("image") }}</span>
                                 @endif
                             </div>
                             <hr>
                             {!! Form::submit("Create new post",["class"=>"btn btn-primary"]) !!}

                             {!! Form::close() !!}
                            --}}

                            <form action="{{ route('admin.store') }}" method="POST">
                                @csrf
                                <label for="type">Type :</label>
                                <select name="type" id="type">
                                    <option value="app-developer">Application Developer</option>
                                    <option value="front-end">Front-End Developer</option>
                                    <option value="back-end">Back end Developer</option>
                                    <option value="full-web-developer">Full Web Developer</option>
                                </select>
                                <label for="title">Title :</label>
                                <input type="text" name="title" id="title" required>
                                <label for="reply">Reply to :</label>
                                <input type="text" name="reply" id="reply" required>
                                <label for="body">Body :</label>
                                <textarea name="body" placeholder="Write your post"></textarea>
                                <br/>
                                <label for="image">Upload /Select your image :</label>
                                <input type="file" name="image">
                                <hr>
                                <input type="submit" value="SUBMIT">
                            </form>
                           </div>
                         <!-- /.box-body -->

                     </div>

                     <!-- /.box -->
                 </div>
             </div>
             <!-- ./row -->
         </section>
     </div>
 @endsection

 @section("script")
     <script type="text/javascript">
         $("ul.pagination").addClass("no margin pagination-sm");
     </script>
         <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
         <script>tinymce.init({ selector:'textarea' });</script>
 @endsection
