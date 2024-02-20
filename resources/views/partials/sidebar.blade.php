<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        Admin <b class="font-black">One</b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
          <a href="{{ route('home') }}">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Menu</p>
      <ul class="menu-list">
        <li class="{{ request()->routeIs('barang.index') ? 'active' : '' }}">
          <a href="{{ route('barang.index') }}">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Barang</span>
          </a>
        </li>
        {{-- <li class="">
          <a href="#">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">User</span>
          </a>
        </li> --}}
      </ul>
    </div>
</aside>
