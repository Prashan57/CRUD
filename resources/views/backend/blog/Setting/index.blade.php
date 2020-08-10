@extends('layouts.backend.dashboard')

@section("title","Blog | Footer")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Display Setting Configuration</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Settings</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            @if($SettingCount<1)
                                <div class="pull-left">
                                    <a href="{{ route("Setting.create") }}" class="btn btn-success">Create New</a>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @if( ! $Setting->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found</strong>
                                </div>
                            @else
                                @foreach($Setting as $set)
                                    <div style="font-size: 18px">
                                        <strong>Take action  </strong>
                                        <a href="{{ route("Setting.edit",$set->id) }}" class="btn btn-xs btn-default">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route("Setting.show", $set->id) }}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash-o fa-lg"></i>
                                        </a>
                                        <br/>
                                        <hr>
                                        <strong>Sidebar Name :</strong><br/>
                                        <small>{{ $set->sidebar }}</small><br/><hr>
                                        <strong>Copyright Content :</strong><br/>
                                        <small>{{ $set->copyright }}</small><br/><hr>
                                        <strong>Link to add for Copyright Content :</strong><br/>
                                        <small>{{ $set->link }}</small><br/><hr>
                                        <strong>Link name to display for Copyright Content :</strong><br/>
                                        <small>{{ $set->linkname }}</small><br/><hr>
                                        <strong>Logo Upload :</strong><br/>
                                        <small>{{ $set->file }}</small><br/><hr>
                                        <strong>Date (recently uploaded)</strong><br/>
                                        <small><abbr title="{{ $set->dateFormatted(true) }}">{{ $set-> dateFormatted() }}</abbr></small><br/>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        </div>
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

