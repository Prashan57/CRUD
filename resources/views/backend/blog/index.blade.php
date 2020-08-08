@extends('layouts.backend.dashboard')

@section("title","Blog | Index")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog<br/>
                <small>Display all blog submits /contacts</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{ url("/home") }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                </li>
                <li>
                    <a href="{{ route("blog.index") }}">Blog</a>
                </li>
                <li class="active">All Submits</li>
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
                            @if(session("message"))
                                <div class="alert alert-info">
                                    {{ session("message") }}
                                </div>
                            @endif
                            @if( ! $blog->count())
                            <div class="alert alert-danger">
                                    <strong>No Record Found</strong>
                            </div>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <td>Name</td>
                                    <td>Type</td>
                                    <td>Email</td>
                                    <td>Base</td>
                                    <td>Extras</td>
                                    <td>Body</td>
                                    <td>Date</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blog as $blogs)
                                    <tr>
                                        <td width="80">
                                            <a href="{{ route("show", $blogs->id) }}" class="btn btn-xs btn-danger">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <td>{{ $blogs->name }}</td>
                                        <td>{{ $blogs->type }}</td>
                                        <td>{{ $blogs->email }}</td>
                                        <td>{{ $blogs->base }}</td>
                                        <td>
                                            <ul>
                                                @if($blogs->design!=null)
                                                    @foreach($blogs->design as $designs)
                                                        <li>{{ $designs }}</li>
                                                    @endforeach
                                                @else
                                                    <p>NOT FILLED</p>
                                                @endif
                                            </ul>
                                        </td>
                                        <td>{{ $blogs->body }}</td>
                                        <td>
                                            <abbr title="{{ $blogs->dateFormatted(true) }}">{{ $blogs-> dateFormatted() }}</abbr>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {!! $blog->links() !!}
                            <div class="pull-right">
                                <small> {{ $blogCount }} {{ Str::plural('Item', $postCount ?? '') }}</small>
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
