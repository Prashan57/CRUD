@extends('layouts.backend.dashboard')

@section("title","Blog | Admin User")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Display all changes in footer</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Admin User Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            @if($userCount<1)
                                <div class="pull-left">
                                    <a href="{{ route("AdminUser.create") }}" class="btn btn-success">Create a New Admin User</a>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @if( ! $user->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found</strong>
                                </div>
                            @else
                                @foreach($user as $users)
                                    <div style="text-align: center">
                                    <div style="font-size: 18px">
                                        <img src="{{ url('/').Storage::url($users->file) }}" style="width: 50%;height: 50%;border-radius:50px"/><br/><br/>
                                        <strong>{{ Auth::User()->name }}</strong><br/>
                                        <hr>
                                        <strong>Username :</strong><br/>
                                        <small>{{ $users->name }}</small><br/><hr>
                                        <strong>Take action  </strong>
                                        <a href="{{ route("AdminUser.edit",$users->id) }}" class="btn btn-xs btn-default">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route("AdminUser.show", $users->id) }}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <hr>
                                        <strong>Date (recently uploaded)</strong><br/>
                                        <small><abbr title="{{ $users->dateFormatted(true) }}">{{ $users-> dateFormatted() }}</abbr></small><br/>
                                    </div>
                                    </div>
                                @endforeach
                            @endif
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

