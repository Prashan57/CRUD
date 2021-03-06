<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/backend/img/user3-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="/backend/AdminUser">
                    <i class="fa fa-user fa-fw"></i> <span>Admin Profile</span>
                </a>
            </li>
            <li>
                <a href="/home">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route("admin") }}"><i class="fa fa-circle-o"></i> Admin Adds</a></li>
                    <li><a href="{{ route("blog.index") }}"><i class="fa fa-circle-o"></i> All Posts</a></li>
                    <li><a href="{{ route("blog.create")}}"><i class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="{{ route("footer.index")}}"><i class="fa fa-circle-o"></i> Footer</a></li>
                </ul>
            </li>
            <li><a href="{{ route("category.index") }}"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
            <li><a href="{{ route("Setting.index") }}"><i class="fa fa-cog fa-2px"></i> <span>Settings</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
