@extends('layouts.backend.dashboard')

@section('title',"Blog | Setting Edit")

@section('content')
    <!-- Form Styling -->
    <link rel="stylesheet" href="/backend/css/from.css">
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Edit / Update Settings</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Edit / Update Settings</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body ">

                            <form action="{{ route("Setting.update",["$Setting->id"]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="sidebar">Sidebar Title :</label>
                                <input type="text" name="sidebar" id="sidebar" value="{{ $Setting->sidebar }}" required>
                                <label for="copyright">Copyright Section :</label>
                                <input type="text" name="copyright" id="copyright" value="{{ $Setting->copyright }}" required>
                                <label for="link">Link in Copyright Section :</label>
                                <input type="text" name="link" id="link" value="{{ $Setting->link }}" required>
                                <label for="linkname">Link name to be displayed in Copyright Section :</label>
                                <input type="text" name="linkname" id="linkname" value="{{ $Setting->linkname }}" required>
                                <div>
                                    <input type="file" name="image" value="{{ $Setting->file }}">{{ $Setting->file }}
                                </div>
                                <br/>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;"><img src="{{ url('/').Storage::url($Setting->file) }}"/></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                </div>
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
