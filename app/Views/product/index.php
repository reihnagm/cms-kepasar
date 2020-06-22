<?= $this->include('Views/templates/admin/head') ?>
<div class="wrapper">

  <!-- Navbar -->
  <?= $this->include("templates/admin/navbar") ?>

  <!-- Main Sidebar Container -->
  <?= $this->include("templates/admin/sidebar") ?>

   <!-- Modal Detail Product -->
   <div class="modal fade" id="detail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Product</h4>
            </div>
            <div class="modal-body">
              <label class="form-label">Product Code</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_code"> </p>
                </div>
              </div>
              <label class="form-label">Product Name</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_name"> </p>
                </div>
              </div>
              <label class="form-label">Product Images</label>
              <div class="form-group">
                <div class="form-line">
                  <img id="detail_product_image" style="width: 120px; height: 120px;" class="img-responsive">
                </div>
              </div>
              <label class="form-label">Product Description</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_description"> </p>
                </div>
              </div>
              <label class="form-label">Product Price</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_price"> </p>
                </div>
              </div>
              <label class="form-label">Product Stock</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_stock"> </p>
                </div>
              </div>
              <label class="form-label">Product Weight</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_weight"> </p>
                </div>
              </div>
              <label class="form-label">Product Unit</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_unit"> </p>
                </div>
              </div>
              <label class="form-label">Product Category</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_category"> </p>
                </div>
              </div>
              <label class="form-label">Product Published</label>
              <div class="form-group">
                <div class="form-line">
                  <p id="detail_product_published"> </p>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Create Product -->
  <div class="modal fade" id="store" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
            </div>
            <div class="modal-body">
              <label class="form-label">Product Code</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_code" name="create_product_code" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Name</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_name" name="create_product_name" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Images</label>
              <div class="form-group">
                <div class="form-line">
                  <input id="create_input_file_product_image" type="file" />
                  <img id="preview_product_image" style="width: 120px; height: 120px;" class="img-responsive">
                </div>
              </div>
              <label class="form-label">Product Description</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_description" name="create_product_description" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Price</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_price" name="create_product_price" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Special Price</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_special_price" name="create_product_special_price" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Price Discount</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_price_discount" name="create_product_price_discount" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Stock</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_stock" name="create_product_stock" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Weight</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_weight" name="create_product_weight" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Unit</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_measurement_unit" name="create_product_measurement_unit" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Dimensions</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_dimensions" name="create_product_dimensions" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Category</label>
              <div class="form-group">
                <div class="form-line">
                  <select id="create_category_select" class="form-control form-control-sm">
                    <?php foreach(allCategories() as $category): ?>
                      <option value="<?= $category->guid ?>"><?= $category->category_name ?></option>
                    <?php endforeach; ?> 
                  </select>
                </div>
              </div>
              <label class="form-label">Adult Only</label>
              <div class="form-group">
                <div class="form-line">
                  <select id="create_adult_select" class="form-control form-control-sm">
                    <option value="true">Yes</option>
                    <option value="false" selected>No</option>
                  </select>
                </div>
              </div>
              <label class="form-label">Published</label>
              <div class="form-group">
                <div class="form-line">
                  <select id="create_published_select" class="form-control form-control-sm">
                    <option value="true">Published</option>
                    <option value="false">Unpublished</option>
                  </select>
                </div>
              </div>
              <label class="form-label">Product Tags</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_tags" name="create_product_tags" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Meta Data</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="create_product_meta_data" name="create_product_meta_data" class="form-control">
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button id="product-btn-store" onclick="store()" type="button" class="btn btn-primary btn-sm">SAVE</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Product -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
            </div>
            <div class="modal-body">
              <input id="product_id" name="product_id" type="hidden"/>
              <label class="form-label">Product Code</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_code" name="product_code" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Name</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_name" name="product_name" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Images</label>
              <div class="form-group">
                <div class="form-line">
                  <img id="product_image" style="width: 120px; height: 120px;" class="img-responsive">
                  <input id="edit_input_file_product_image" type="file" >
                </div>
              </div>
              <label class="form-label">Product Description</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_description" name="product_description" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Price</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_price" name="product_price" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Special Price</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_special_price" name="product_special_price" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Price Discount</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_price_discount" name="product_price_discount" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Stock</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_stock" name="product_stock" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Weight</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_weight" name="product_weight" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Unit</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_measurement_unit" name="product_measurement_unit" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Dimensions</label>
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="product_dimensions" name="product_dimensions" class="form-control">
                </div>
              </div>
              <label class="form-label">Product Category</label>
              <div class="form-group">
                <div class="form-line">
                  <select id="category_select" class="form-control form-control-sm">
                    <?php foreach(allCategories() as $category): ?>
                      <option value="<?= $category->guid ?>"><?= $category->category_name ?></option>
                    <?php endforeach; ?> 
                  </select>
                </div>
              </div>
              <label class="form-label">Adult Only</label>
              <div class="form-group">
                <div class="form-line">
                  <select id="category_select" class="form-control form-control-sm">
                    <option value="true">Yes</option>
                    <option value="false" selected>No</option>
                  </select>
                </div>
              </div>
              <label class="form-label">Published</label>
              <div class="form-group">
                <div class="form-line">
                  <select id="published_select" class="form-control form-control-sm">
                    <option value="true">Published</option>
                    <option value="false">Unpublished</option>
                  </select>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button id="product-btn-update" onclick="update()" type="button" class="btn btn-primary btn-sm">SIMPAN</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
        </div>
      </div>
    </div>
  </div>

  <div class="content-wrapper">

    <div class="content-header"></div>

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
                      <th>Price</th>
                      <th>Category</th>
                      <th>Stock</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php foreach($products as $product) : ?>
                    <tr>
                      <td><?= $product->id ?></td>
                      <td><?= $product->name ?></td>
                      <td><?= number_to_currency((int) $product->price, "IDR") ?></td>
                      <td><?= $product->category->name ?></td>
                      <td><?= $product->stock ?></td>
                      <td width="125">
                        <button onclick="detail('<?= $product->id ?>')" type="button" class="btn btn-primary btn-sm"> 
                          <i class="fas fa-bars"></i> 
                        </button>
                        <button onclick="edit('<?= $product->id ?>')" type="button" class="btn btn-primary btn-sm"> 
                          <i class="far fa-edit"></i> 
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


