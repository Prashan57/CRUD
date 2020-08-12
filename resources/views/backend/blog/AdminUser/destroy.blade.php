@extends('layouts.backend.dashboard')

@section("title","Blog | Admin User")
@section('content')
    <!-- Form Styling -->
    <link rel="stylesheet" href="/backend/css/from.css">
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Delete the User (Admin User)</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Delete user</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body ">
                            <h3>{{ Auth::User()->name }}</h3>
                            <hr>


                            <div style="font-size: 18px">
                                <strong>Username :</strong><br/>
                                <small>{{ $user->name }}</small><br/><hr>
                                <strong>File / Image uploaded :</strong><br/>
                                <small>{{ $user->file }}</small><br/><hr>

                                <strong>Date (recently uploaded)</strong><br/>
                                <small><abbr title="{{ $user->dateFormatted(true) }}">{{ $user-> dateFormatted() }}</abbr></small><br/>
                            </div>
                            <hr>
                            <form action="{{ route('AdminUser.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE USER">
                            </form>
                        </div>
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

