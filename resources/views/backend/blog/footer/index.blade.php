@extends('layouts.backend.dashboard')

@section("title","Blog | Footer")
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
                <li class="active">All Submits</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            @if($footerCount<1)
                            <div class="pull-left">
                                <a href="{{ route("footer.create") }}" class="btn btn-success">Create a New Footer</a>
                            </div>
                                @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @if( ! $footer->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found</strong>
                                </div>
                            @else
                                @foreach($footer as $foot)
                                    <div style="font-size: 18px">
                                <strong>Take action  </strong>
                                <a href="{{ route("footer.edit",$foot->id) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route("footer.show", $foot->id) }}" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>
                                </a>
                                    <br/>
                                        <hr>
                                <strong>Caption</strong><br/>
                                <small>{{ $foot->caption }}</small><br/><hr>
                                <strong>Location</strong><br/>
                                        <small>{{ $foot->location }}</small><br/><hr>
                                <strong>E-mail Address</strong><br/>
                                            <small>{{ $foot->email }}</small><br/><hr>
                                <strong>Phone / Contact Number</strong><br/>
                                                <small>{{ $foot->phone }}</small><br/><hr>
                                <strong>Facebook ID</strong><br/>
                                                    <small>{{ $foot->fb }}</small><br/><hr>
                                <strong>Date (recently uploaded)</strong><br/>
                                <small><abbr title="{{ $foot->dateFormatted(true) }}">{{ $foot-> dateFormatted() }}</abbr></small><br/>
                                    </div>
                                @endforeach
                                @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {!! $footer->links() !!}
                            <div class="pull-right">
                                <small> {{ $footerCount }} {{ Str::plural('Item', $footerCount ?? '') }}</small>
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

