@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">

      <div class="user-profile">
    <div class="ulogo">
       <a href="index.html">
        <!-- logo for regular state and mobile devices -->
         <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
            <h3><b>Universal It Park</b></h3>
         </div>
      </a>
    </div>
      </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
     <li class="{{ ($route == 'dashboard')? 'active':'' }}">
        <a href="{{ url('admin/dashboard') }}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview {{ ($prefix == '/brand')? 'active':'' }}">
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Brands</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.brand')? 'active':'' }}">
            <a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
          <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/category')? 'active':'' }}">
        <a href="#">
          <i data-feather="mail"></i> <span>Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.category')? 'active':'' }}">
            <a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a>
          </li>
          <li class="{{ ($route == 'all.subcategory')? 'active':'' }}">
            <a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Sub Category</a>
          </li>
          <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}">
            <a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Sub Subcategory</a>
          </li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/product')? 'active':'' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Product</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'product.add')? 'active':'' }}">
            <a href="{{ route('product.add') }}"><i class="ti-more"></i>Add Product</a>
          </li>
          <li class="{{ ($route == 'product.manage')? 'active':'' }}">
            <a href="{{ route('product.manage') }}"><i class="ti-more"></i>Manage Product</a>
          </li>
          <li><a href="gallery.html"><i class="ti-more"></i>Payment </a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/slider')? 'active':'' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Slider</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'slider.view')? 'active':'' }}">
            <a href="{{ route('slider.view') }}"><i class="ti-more"></i>Manage Slider</a>
          </li>
          <li>
            <a href="#"><i class="ti-more"></i>Slider</a>
          </li>
          <li><a href="gallery.html"><i class="ti-more"></i>Payment </a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/cupons')? 'active':'' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Cupons</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'cupons.view')? 'active':'' }}">
            <a href="{{ route('cupons.view') }}"><i class="ti-more"></i>Manage Cupon</a>
          </li>
          <li><a href="gallery.html"><i class="ti-more"></i>Payment </a></li>
        </ul>
      </li>

      <li class="header nav-small-cap">User Interface</li>

      <li class="treeview">
        <a href="#">
          <i data-feather="grid"></i>
          <span>Components</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
          <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
        </ul>
      </li>

  <li class="treeview">
        <a href="#">
          <i data-feather="credit-card"></i>
          <span>Cards</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
    </ul>
      </li>

  <li class="header nav-small-cap">EXTRA</li>

      <li class="treeview">
        <a href="#">
          <i data-feather="layers"></i>
    <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Level One</a></li>
          <li class="treeview">
            <a href="#">Level One
              <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Level Two</a></li>
              <li class="treeview">
                <a href="#">Level Two
                  <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#">Level Three</a></li>
                  <li><a href="#">Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#">Level One</a></li>
        </ul>
      </li>
    </ul>
  </section>

<div class="sidebar-footer">
  <!-- item-->
  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
  <!-- item-->
  <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
  <!-- item-->
  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>
</aside>
