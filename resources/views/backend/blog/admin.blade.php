@extends('layouts.backend.dashboard')

@section("title","Blog | Admin")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Display admin blog submits /contacts</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">Admin Submits</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{ route("blog.create") }}" class="btn btn-success">Add New</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            {{--
                            @if( ! $admins->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found</strong>
                                </div>

                            @else   --}}
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Action</th>
                                        <td>Category ID</td>
                                        <td>Title</td>
                                        <td>Body</td>
                                        <td>Image File</td>
                                        <td>Reply</td>
                                        <td>Date</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admin as $admins)
                                        <tr>
                                            <td width="80">
                                                <a href="{{ route("admin.edit",["$admins->id"]) }}" class="btn btn-xs btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route("admin.destroy",["$admins->id"]) }}" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td>{{ $admins->category_id }}</td>
                                            <td>{{ $admins->title }}</td>
                                            <td>{{ $admins->body }}</td>
                                            <td>{{ $admins->file }}</td>
                                            <td>{{ $admins->reply }}</td>
                                            <td>
                                                <abbr title="{{ $admins->dateFormatted(true) }}">{{ $admins-> dateFormatted() }}</abbr>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                           {{-- @endif --}}
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <ul class="pagination no-margin">
                                    {!! $admin->links() !!}
                                </ul>
                            </div>
                            <div class="pull-right">
                                <small> {{ $adminCount }} {{ Str::plural('Item', $adminCount ?? '') }}</small>
                            </div>
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
