@extends('layouts.backend.dashboard')

@section('title',"Blog | Footer Edit")

@section('content')
    <!-- Form Styling -->
    <link rel="stylesheet" href="/backend/css/from.css">
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Edit / Update Footer for changes</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Edit / Update Footer</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body ">

                            <form action="{{ route("footer.update",["$footer->id"]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="caption">Caption :</label>
                                <input type="text" name="caption" id="caption" value="{{ $footer->caption }}" required>
                                <label for="location">Location :</label>
                                <input type="text" name="location" id="location" value="{{ $footer->location }}" required>
                                <label for="email">E-mail Address :</label>
                                <input type="text" name="email" id="email" value="{{ $footer->email }}" required>
                                <label for="fb">Facebook ID :</label>
                                <input type="text" name="fb" id="fb" value="{{ $footer->fb }}" required>
                                <br/>
                                <br/>
                                <label for="phone">Phone / Contact Number :</label>
                                <input type="number" name="phone" id="phone" value="{{ $footer->phone }}" required>
                                <br/>
                                <br/>
                                <input type="submit" value="UPDATE">
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
