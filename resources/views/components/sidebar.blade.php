<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      @foreach( config('app_academic.sections_menu') as $section_menu)
        <li class="menu-header">{{ $section_menu->header }}</li>
        @foreach( $section_menu->menus as $menu)
          <li class="nav-item dropdown active">
            <a href="@if($menu->route) {{route($menu->route)}} @endif" class="nav-link @if(!$menu->route) has-dropdown @endif">
              <i class="{{ $menu->icon }}"></i>
              <span>{{$menu->title}}</span></a>
            @if(isset($menu->submenus))
              <ul class="dropdown-menu">
                @foreach( $menu->submenus as $submenu)
                  <li><a class="nav-link" href="@if($submenu->route) {{route($submenu->route)}} @else #! @endif">{{ $submenu->title }}</a></li>
                @endforeach
                <!-- <li class="active"><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> -->
              </ul>
            @endif
          </li>
        @endforeach
      @endforeach
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
  </aside>
</div>