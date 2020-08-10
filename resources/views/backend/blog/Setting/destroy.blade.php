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
                            <h3>Settings created by {{ Auth::User()->name }}</h3>
                            <hr>
                            <div style="font-size: 18px">
                                <strong>Sidebar Name :</strong><br/>
                                <small>{{ $Setting->sidebar }}</small><br/><hr>
                                <strong>Copyright section :</strong><br/>
                                <small>{{ $Setting->copyright }}</small><br/><hr>
                                <strong>Link added to Copyright section :</strong><br/>
                                <small>{{ $Setting->link }}</small><br/><hr>
                                <strong>Link name displayed to Copyright section :</strong><br/>
                                <small>{{ $Setting->linkname }}</small><br/><hr>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;"><img src="{{ url('/').Storage::url($Setting->file) }}"/></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                </div>
                                <strong>Date (recently uploaded)</strong><br/>
                                <small><abbr title="{{ $Setting->dateFormatted(true) }}">{{ $Setting-> dateFormatted() }}</abbr></small><br/>
                            </div>
                            <hr>
                            <form action="{{ route('Setting.destroy', $Setting->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE SETTINGS">
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

