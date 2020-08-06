@extends('layouts.backend.dashboard')

@section("title","Blog | Category")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Display all categories</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">All Categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{ route("category.create") }}" class="btn btn-success">Add New</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @if(session("message"))
                                <div class="alert alert-info">
                                    {{ session("message") }}
                                </div>
                            @endif
                            @if( ! $category->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found</strong>
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th> Category ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $cat)
                                        <tr>
                                            <td width="80">
                                                <a href="{{ route("category.edit",["$cat->id"]) }}" class="btn btn-xs btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route("category.show",["$cat->id"]) }}" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td width="100" style="text-align: center">{{ $cat->id }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td width="100">
                                                <abbr title="{{ $cat->dateFormatted(true) }}">{{ $cat->dateFormatted() }}</abbr>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <ul class="pagination no-margin">
                                    {!! $category->links() !!}
                                </ul>
                            </div>
                            <div class="pull-right">
                                <small> {{ $categoryCount }} {{ Str::plural('Item', $categoryCount ?? '') }}</small>
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
