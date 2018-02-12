  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i>Post Home</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Post
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i>List</a></li>

                @can('posts.create', Auth::user())
                <li><a href="{{ route('post.create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
                @endcan
  
                @can('posts.delete', Auth::user())
                    
                <li><a href="{{ route('post.showTrash') }}"><i class="fa fa-circle-o"></i>Trashed</a></li>
                @endcan
              </ul>
            </li>

            @can('posts.category', Auth::user())
                
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Category
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                <li><a href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
              </ul>
            </li>
            @endcan

            @can('posts.tag', Auth::user())

            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Tag
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                <li><a href="{{ route('tag.create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
              </ul>
            </li>
            @endcan

            @can('posts.delete', Auth::user())
            <li><a href="{{ route('post.showTrash') }}"><i class="fa fa-circle-o"></i>Post Trash</a></li>
            @endcan
            
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>

        <li class="header">LABELS</li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
        @can('users.role', Auth::user())
        <li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Role</span></a></li>
        @endcan
        
        @can('users.permission', Auth::user())
        <li><a href="{{ route('permission.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Permission</span></a></li>
        @endcan
      
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>