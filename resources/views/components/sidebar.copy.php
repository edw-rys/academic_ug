<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('user.dashboard.index')}}">AtlantisLow</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('user.dashboard.index')}}">UG</a>
    </div>
    <ul class="sidebar-menu">
      @foreach( config('app_academic.sections_menu') as $section_menu)
        <li class="menu-header">{{ $section_menu->header }}</li>
        @foreach( $section_menu->menus as $menu)
          @if(!$menu->has_permissions || have_permission($menu->permissions,auth()->user()->id))
          <li class="nav-item dropdown ">
            <a href="@if($menu->route && route_exists($menu->route)) {{route($menu->route)}} @endif" class="nav-link @if(!$menu->route) has-dropdown @endif">
              <i class="{{ $menu->icon }}"></i>
              <span>{{$menu->title}}</span></a>
            @if(isset($menu->submenus))
              <ul class="dropdown-menu">
                @foreach( $menu->submenus as $submenu)
                @if(!$submenu->has_permissions || have_permission($submenu->permissions,auth()->user()->id))
                  <li><a class="nav-link" href="@if($submenu->route && route_exists($submenu->route)) {{route($submenu->route)}} @else #! @endif">{{ $submenu->title }}</a></li>
                @endif
                @endforeach
                <!-- <li class="active"><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> -->
              </ul>
            @endif
          </li>
          @endif
        @endforeach
      @endforeach
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://github.com/edw-rys" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Github
        </a>
      </div>
  </aside>
</div>