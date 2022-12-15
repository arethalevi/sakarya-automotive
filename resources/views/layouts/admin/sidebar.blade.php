<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.category') }}">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.catalog') }}">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Catalog</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.production') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Production</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.qualitycontrol') }}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Quality Control</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.inventory') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Inventory</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.order') }}">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Order & Shipping</span>
        </a>
      </li>
    </ul>
</nav>
