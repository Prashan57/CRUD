@extends('layouts.backend.dashboard')

@section('title',"Blog | Setting")

@section('content')
    <!-- Form Styling -->
    <link rel="stylesheet" href="/backend/css/from.css">
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Configure youu blog from setting</small>
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

                            <form action="{{ route('Setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="sidebar">Sidebar Title :</label>
                                <input type="text" name="sidebar" id="sidebar" required>
                                <label for="copyright">Copyright Section :</label>
                                <input type="text" name="copyright" id="copyright" required>
                                <label for="link">Link to be added to Copyright Section :</label>
                                <input type="text" name="link" id="link" required>
                                <label for="linkname">Link name to be displayed to Copyright Section :</label>
                                <input type="text" name="linkname" id="linkname" required>
                                <label for="file">Logo Upload :</label>
                                <input type="file" name="image">
                                <br/>
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
