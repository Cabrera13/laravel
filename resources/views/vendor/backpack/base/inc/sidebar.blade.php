@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        @include('backpack::inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>{{ trans_choice('dashboard.User',2) }}</span></a></li>
          <li><a href="{{ backpack_url('book') }}"><i class="fa fa-book"></i> <span>{{ trans_choice('dashboard.Book',2) }}</span></a></li>
          <li><a href="{{ backpack_url('order') }}"><i class="fa fa-edit"></i> <span>{{ trans_choice('dashboard.Order',2) }}</span></a></li>
          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
