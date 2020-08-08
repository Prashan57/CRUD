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
                            <h3>User provided data for {{ Auth::User()->name }}</h3>
                            <hr>
                            <div style="font-size: 18px">
                                <strong>Category / Type :</strong><br/>
                                <small>{{ $blog->type }}</small><br/><hr>
                                <strong>E-mail :</strong><br/>
                                <small>{{ $blog->email }}</small><br/><hr>
                                <strong>Base :</strong><br/>
                                <small>{{ $blog->base }}</small><br/><hr>
                                <strong>Extras :</strong><br/>
                                <small>
                                    <ul>
                                        @if($blog->design!=null)
                                            @foreach($blog->design as $designs)
                                                <li>{{ $designs }}</li>
                                            @endforeach
                                        @else
                                            <p>NOT FILLED</p>
                                        @endif
                                    </ul>
                                </small>
                            </div>
                            <hr>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE">
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

