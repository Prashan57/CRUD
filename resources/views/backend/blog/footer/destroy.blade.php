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
                                        <strong>Caption</strong><br/>
                                        <small>{{ $footer->caption }}</small><br/><hr>
                                        <strong>Location</strong><br/>
                                        <small>{{ $footer->location }}</small><br/><hr>
                                        <strong>E-mail Address</strong><br/>
                                        <small>{{ $footer->email }}</small><br/><hr>
                                        <strong>Phone / Contact Number</strong><br/>
                                        <small>{{ $footer->phone }}</small><br/><hr>
                                        <strong>Facebook ID</strong><br/>
                                        <small>{{ $footer->fb }}</small><br/><hr>
                                        <strong>Date (recently uploaded)</strong><br/>
                                        <small><abbr title="{{ $footer->dateFormatted(true) }}">{{ $footer-> dateFormatted() }}</abbr></small><br/>
                                    </div>
                            <hr>
                                    <form action="{{ route('footer.destroy', $footer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="DELETE FOOTER">
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

