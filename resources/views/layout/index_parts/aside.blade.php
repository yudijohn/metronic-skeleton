<!--begin:Menu item-->
<div class="menu-item">
  <!--begin:Menu link-->
  <a class="menu-link {{ Request::is( '/' ) ? 'active' : '' }}" href="{{ route( 'admin::home::index' ) }}">
    <span class="menu-icon">
      <i class="ki-duotone ki-element-11 fs-2">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
        <span class="path4"></span>
      </i>
    </span>
    <span class="menu-title">Dashboard</span>
  </a>
  <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item pt-5">
  <!--begin:Menu content-->
  <div class="menu-content">
    <span class="menu-heading fw-bold text-uppercase fs-7">Data Master</span>
  </div>
  <!--end:Menu content-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is( 'users*' ) || Request::is( 'roles*' ) ? 'show' : '' }}">
  <!--begin:Menu link-->
  <span class="menu-link">
    <span class="menu-icon">
      <i class="ki-duotone ki-user fs-2">
        <span class="path1"></span>
        <span class="path2"></span>
      </i>
    </span>
    <span class="menu-title">User Management</span>
    <span class="menu-arrow"></span>
  </span>
  <!--end:Menu link-->
  <!--begin:Menu sub-->
  <div class="menu-sub menu-sub-accordion">
    <!--begin:Menu item-->
    <div class="menu-item">
      <!--begin:Menu link-->
      <a class="menu-link {{ Request::is( 'users*' ) ? 'active' : '' }}" href="{{ route( 'admin::users::index' ) }}">
        <span class="menu-bullet">
          <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">User List</span>
      </a>
      <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
    <!--begin:Menu item-->
    <div class="menu-item">
      <!--begin:Menu link-->
      <a class="menu-link {{ Request::is( 'roles*' ) ? 'active' : '' }}" href="{{ route( 'admin::roles::index' ) }}">
        <span class="menu-bullet">
          <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">Role List</span>
      </a>
      <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
  </div>
  <!--end:Menu sub-->
</div>
<!--end:Menu item-->