<?= $this->include('Views/templates/admin/head') ?>
<div class="wrapper">

<!-- Navbar -->
<?= $this->include("templates/admin/navbar") ?>

<!-- Main Sidebar Container -->
<?= $this->include("templates/admin/sidebar") ?>

  <div class="content-wrapper">

    <div class="content-header"></div>

     <!-- Modal Detail Category -->
     <div class="modal fade" id="detailCategory" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create Category</h4>
          </div>
          <div class="modal-body">
            <label class="form-label">Category Name</label>
            <div class="form-group">
              <div class="form-line">
                <p id="detail_category_name"></p>
              </div>
            </div>
            <label class="form-label">Category Description</label>
            <div class="form-group">
              <div class="form-line">
                <p id="detail_category_description"></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal Create Category -->
     <div class="modal fade" id="storeCategory" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create Category</h4>
          </div>
          <div class="modal-body">
            <label class="form-label">Category Name</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="create_category_name" name="create_category_name" class="form-control">
              </div>
            </div>
            <label class="form-label">Category Description</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="create_category_description" name="create_category_description" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="category-btn-store" onclick="storeCategory()" type="button" class="btn btn-primary btn-sm">SAVE</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal Edit Category -->
     <div class="modal fade" id="editCategory" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Category</h4>
          </div>
          <div class="modal-body">
            <label class="form-label">Category Name</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="edit_category_name" name="edit_category_name" class="form-control">
              </div>
            </div>
            <label class="form-label">Category Description</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="edit_category_description" name="edit_category_description" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="category-btn-update" onclick="updateCategory()" type="button" class="btn btn-primary btn-sm">SAVE</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Create Category -->
    <div class="modal fade" id="storeCategory" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create Category</h4>
          </div>
          <div class="modal-body">
            <label class="form-label">Category Name</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="create_category_name" name="create_category_name" class="form-control">
              </div>
            </div>
            <label class="form-label">Category Description</label>
            <div class="form-group">
              <div class="form-line">
                <input type="text" id="create_category_name" name="create_category_name" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="category-btn-store" onclick="storeCategory()" type="button" class="btn btn-primary btn-sm">SAVE</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="product-lists" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>UID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php foreach($categories as $category) : ?>
                    <tr>
                      <td><?= $category->guid ?></td>
                      <td><?= $category->category_name ?></td>
                      <td><?= $category->description ?></td>
                      <td width="125">
                        <button onclick="detailCategory('<?= $category->guid ?>')" type="button" class="btn btn-primary btn-sm"> 
                          <i class="fas fa-bars"></i> 
                        </button>
                        <button onclick="editCategory('<?= $category->guid ?>')" type="button" class="btn btn-primary btn-sm"> 
                          <i class="far fa-edit"></i> 
                        </button>
                        <button onclick="deleteCategory('<?= $category->guid ?>')" type="button" class="btn btn-danger btn-sm"> 
                          <i class="fa fa-trash"></i> 
                        </button>
                      </td> 
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

</div>

<?= $this->include("templates/admin/foot.php") ?>
