@extends('layouts.backend.dashboard')

@section('title',"Blog | Footer")

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

                            <form action="{{ route('footer.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="caption">Caption :</label>
                                <input type="text" name="caption" id="caption" required>
                                <label for="location">Location :</label>
                                <input type="text" name="location" id="location" required>
                                <label for="email">Email :</label>
                                <input type="text" name="email" id="email" required>
                                <label for="fb">Facebook Id :</label>
                                <input type="text" name="fb" id="fb" required>
                                <br/>
                                <br/>
                                <label for="phone">Phone / Contact Number :</label>
                                <input type="number" name="phone" id="phone" required>
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
