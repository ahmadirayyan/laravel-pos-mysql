<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link" href="index3.html">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="POS" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">POS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block" href="#">Royndisign</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a class="nav-link active" href="#">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Dashboard
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fa fa-server"></i>
            <p>
              Product Management
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('kategori.index') }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('produk.index') }}">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Product</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
