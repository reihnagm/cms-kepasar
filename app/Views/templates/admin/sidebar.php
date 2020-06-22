<?php 
  use Config\Services;
  $request = Services::request();
?> 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="javascript:void(0)" class="brand-link">
   
    
  </a>  -->

  <div class="container" style="margin: 15px 0 0 30px;">
    <div class="row">
      <div>
        <img src="<?= base_url('public/images/logo.png') ?>" alt="Kepasar Logo" class="brand-image img-circle" 
        style="width: 30px !important;">
      </div>
      <div style="margin: 6px 0 0 14px;">
        <img src="<?= base_url('public/images/kepasar.png') ?>" alt="Kepasar Text" class="brand-image img-square" style="width: 180px !important;">
      </div>
    </div>
  </div>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('public/adminLTE-3/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <span id="welcome">Welcome,</span>
        <a href="#" class="d-block"><?= session('full_name') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a> 
        </li>

        <li class="nav-item has-treeview <?= $request->uri->getSegment(2) == 'products' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/products/list') ?>" class="nav-link <?= $request->uri->getSegment(2) == 'products' ? 'active' : '' ?>">
                <p>Lists Product</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview <?= $request->uri->getSegment(2) == 'categories' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link active">
            <i class="nav-icon fab fa-buffer"></i>
            <p>
              Categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/categories/list') ?>" class="nav-link <?= $request->uri->getSegment(2) == 'categories' ? 'active' : '' ?>">
                <p>List Category</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-id-card"></i>
            <p>
              Account
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a onclick="logout();" href="javascript:void(0);" class="nav-link">
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </li>       

      </ul>
    </nav>
  </div>

 </aside>