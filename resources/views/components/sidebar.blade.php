<div class="sidebar sidebar-style-2">			
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="{{ asset('img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse">
            <span>
              {{ auth()->user()->name }} {{ auth()->user()->last_name }}
              {{-- @dump(auth()->user()->roles) --}}
              @foreach (auth()->user()->roles as $role)
                <span class="user-level">{{ $role->description }}</span>  
              @endforeach
              {{-- <span class="caret"></span> --}}
            </span>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <ul class="nav nav-primary">
        @foreach( config('app_academic.sections_menu') as $section_menu)
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">{{ $section_menu->header }}</h4>
          </li>
          @foreach( $section_menu->menus as $menu)
            @if(!$menu->has_permissions || have_permission($menu->permissions,auth()->user()->id))
              <li class="nav-item {{ \Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == $menu->route ? 'active':''}}" >
                <a @if(!route_exists($menu->route)) data-toggle="collapse" @endif href="@if($menu->route && route_exists($menu->route)) {{route($menu->route)}} @else #{{$menu->id}} @endif">
                  <i class="{{ $menu->icon }}"></i>
                  <p>{{$menu->title}}</p>
                  @if(isset($menu->submenus))
                    <span class="caret"></span>
                  @endif
                </a>
                @if(isset($menu->submenus))
                  <div class="collapse" id="{{$menu->id}}">
                    <ul class="nav nav-collapse">
                      @foreach( $menu->submenus as $submenu)
                      @if(!$submenu->has_permissions || have_permission($submenu->permissions,auth()->user()->id))
                        <li>
                          <a href="@if($submenu->route && route_exists($submenu->route)) {{route($submenu->route)}} @else #! @endif"">
                            <span class="sub-item">{{ $submenu->title }}</span>
                          </a>
                        </li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                @endif
              </li>
            @endif
          @endforeach
        @endforeach
      </ul>
    </div>
  </div>
</div>
