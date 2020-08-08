@extends('layouts.backend.dashboard')

@section("title","Blog | Footer")
@section('content')
    <!-- Form Styling -->
    <link rel="stylesheet" href="/backend/css/from.css">
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Delete the footer created</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Delete footer</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body ">
                            <h3>Footer created by {{ Auth::User()->name }}</h3>
                            <hr>


                            <div style="font-size: 18px">
                                <strong>Category / Type :</strong><br/>
                                <small>{{ $admin->category_id }}</small><br/><hr>
                                <strong>Title :</strong><br/>
                                <small>{{ $admin->title }}</small><br/><hr>
                                <strong>Replied To :</strong><br/>
                                <small>{{ $admin->reply }}</small><br/><hr>
                                <strong>Body :</strong><br/>
                                <small>{{ $admin->body }}</small><br/>
                                <strong>Image File :</strong>
                                <small>{{ $admin->file }}</small><br/><hr>
                                <strong>Date (recently uploaded)</strong><br/>
                                <small><abbr title="{{ $admin->dateFormatted(true) }}">{{ $admin-> dateFormatted() }}</abbr></small><br/>
                            </div>
                            <hr>
                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE">
                            </form>
                        </div>
                        <a href="{{ route('admin') }}" class="back"><- Back to all Submitters</a>
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
@endsection

