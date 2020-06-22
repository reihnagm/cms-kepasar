<?php 
  use Config\Services;
  $request = Services::request();
?> 


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
      <?php 
        switch ($request->uri->getSegment(2)) {
          case 'dashboard':
            echo '<h3 class="ml-2 text-dark">Dashboard</h3>';
          break;
          case 'products':
            echo '<div class="row">
            <h3 class="ml-3 text-dark">Lists Product</h3>
            <div class="ml-3">
              <a onclick="create()" href="javascript:void(0)" class="btn btn-primary btn-sm">Add Product</a>
            </div>
            </div>';
          break;
          case 'products':
            echo '<div class="row">
            <h3 class="ml-3 text-dark">Lists Product</h3>
            <div class="ml-3">
              <a onclick="create()" href="javascript:void(0)" class="btn btn-primary btn-sm">Add Product</a>
            </div>
            </div>';
          break;
          case 'categories': 
            echo '<div class="row">
            <h3 class="ml-3 text-dark">Lists Category</h3>
              <div class="ml-3">
                <a onclick="createCategory()" href="javascript:void(0)" class="btn btn-primary btn-sm">Add Category</a>
              </div>
            </div>';
          default;  
          break;
        }
      ?>
    </li>
  </ul>    
</nav>