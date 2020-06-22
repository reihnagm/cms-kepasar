<!-- jQuery -->
<script src="<?= base_url('public/adminLTE-3/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('public/adminLTE-3/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- DataTables -->
<script src="<?= base_url('public/adminLTE-3/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/adminLTE-3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/adminLTE-3/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/adminLTE-3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script>
  const token = '<?= getToken(); ?>';
  const baseUrl = '<?= base_url(); ?>';
  $.widget.bridge('uibutton', $.ui.button);

  $(function() {
    $('.lazy').lazy();
  });

  $('#product-lists').DataTable({
    responsive: true,
    autoWidth: false,
  });

  // $('#product-lists').DataTable({
  //   responsive: true,
  //   serverSide: true,
  //   ajax: {
  //     url: `${baseUrl}/admin/products/datatables` ,
  //     dataType: "JSON",
  //     type: "GET"
  //   },
  //   columns: [
  //     {
  //       data: "No",
  //       searchable: false,
  //       orderable: false,
  //     },
  //     {
  //       data: "UID"
  //     },
  //     {
  //       data: "Name"
  //     },
  //     {
  //       data: "Price"
  //     },
  //     {
  //       data: "Weight"
  //     },
  //     {
  //       data: "Stock"
  //     }
  //   ]
  // });

  create = () => {
    $('#store').modal('show');
  }

  store = () => {
    let fd = new FormData();
    let cat_id = $("#create_category_select").val();  
    let code = $("#create_product_code").val();
    let name = $("#create_product_name").val();
    let desc = $("#create_product_description").val();
    let price =  $("#create_product_price").val();
    let specialPrice = $("#create_product_special_price").val();
    let priceDiscount = $("#create_product_price_discount").val();
    let img = $('#create_input_file_product_image')[0].files[0];  
    let dimensions = $('#create_product_dimensions').val();
    let weight = $("#create_product_weight").val();
    let stock = $("#create_product_stock").val();
    let published = $("#create_published_select").val();
    let unit = $("#create_product_measurement_unit").val();
    let adult = $("#create_adult_select").val();
    let tags = $("#create_product_tags").val();
    let metaData = $("#create_product_meta_data").val();
    fd.append('catId', cat_id);
    fd.append('code', code);
    fd.append('name', name);
    fd.append('desc', desc);
    fd.append('price', price);
    fd.append('specialPrice', specialPrice);
    fd.append('priceDiscount', priceDiscount);
    fd.append('dimensions', dimensions);
    fd.append('img', img);
    fd.append('weight', weight);
    fd.append('stock', stock);
    fd.append('published', published);
    fd.append('unit', unit);
    fd.append('adult', adult);
    fd.append('tags', tags);
    fd.append('metaData', metaData);
    $('#product-btn-store').text(`PROCESS`);
    $.ajax({
      type: "POST",
      url: `${baseUrl}/admin/products/store`,
      cache: false,
      contentType: false,
      processData: false,
      data: fd,  
      // beforeSend: function (xhr) {
      //   xhr.setRequestHeader("Authorization", `Bearer ${token}`);
      //   xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
      //   xhr.setRequestHeader("Content-Type", "application/json");
      // }, 
      success: function(data) {
        // $('#store').modal('hide');
        // Swal.fire(
        //   'Successfully !',
        //   'Product Created !',
        //   'success'
        // )
        // window.location.reload();
        $('#product-btn-store').text('CREATE');
      }
    });
  }

  edit = async (id) => {
    $('#edit').modal('show');
    let fd = new FormData();
    fd.append('id', id);
    await $.ajax({
      type: "POST",
      url: `${baseUrl}/admin/products/edit`,
      cache: false,
      contentType: false,
      processData: false,
      data: fd,
      // beforeSend: function (xhr) {
      //   xhr.setRequestHeader("Authorization", `Bearer ${token}`);
      //   xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
      //   xhr.setRequestHeader("Content-Type", "application/json");
      // },
      success: function(data) {
        let result = JSON.parse(data);
        $("#category_select option").filter(function() {
          return $(this).val() === result.product.category.id;
        }).prop('selected', true);
        $("#published_select option").filter(function() {
          return $(this).val() === result.product.published;
        }).prop('selected', true);
        $("#product_id").val(result.product.id);
        $("#product_code").val(result.product.product_code);
        $("#product_name").val(result.product.name);
        $("#product_image").attr('src', `https://api2.kepasar.co.id${result.product.images}`);
        $("#product_description").val(result.product.descriptions);
        $("#product_price").val(result.product.price);
        $("#product_price_discount").val(result.product.price_discount);
        $("#product_stock").val(result.product.stock);
        $("#product_weight").val(result.product.weight);
        $("#product_measurement_unit").val(result.product.unit);
      }
    });
  }

  update = async () => {
    let fd = new FormData();
    let catId = $('#category_select').val();
    let published = $('#published_select').val();
    let adult = $('#adult_select').val();
    let id = $('#product_id').val();
    let code = $('#product_code').val();
    let name = $('#product_name').val();
    let desc = $('#product_description').val();
    let image = $('#edit_input_file_product_image')[0].files[0];  
    let specialPrice = $('#product_special_price').val();
    let priceDiscount = $("#product_price_discount").val();
    let price = $('#product_price').val();
    let dimensions = $('#product_dimension').val();
    let stock = $('#product_stock').val();
    let weight = $('#product_weight').val();
    let tags = $('#product_tags').val();
    let metaData =  $('#product_meta_data').val();
    let unit = $('#product_measurement_unit').val();
    fd.append('id', id);
    fd.append('catId', catId);
    fd.append('code', code);
    fd.append('name', name);
    fd.append('desc', desc);
    fd.append('img', image);
    fd.append('price', price);
    fd.append('specialPrice', specialPrice);
    fd.append('priceDiscount', priceDiscount);
    fd.append('dimensions', dimensions);
    fd.append('stock', stock);
    fd.append('weight', weight);
    fd.append('unit', unit);
    fd.append('published', published);
    fd.append('adult', adult);
    fd.append('tags', tags);
    fd.append('metaData', metaData);
    $('#product-btn-update').text(`PROCESS`);
    await $.ajax({
      type: "POST",
      url: `${baseUrl}/admin/products/update`,
      cache: false,
      contentType: false,
      processData: false,
      data: fd, 
      // beforeSend: function (xhr) {
      //   xhr.setRequestHeader("Authorization", `Bearer ${token}`);
      //   xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
      //   xhr.setRequestHeader("Content-Type", "application/json");
      // }, 
      success: function(data) {
        $('#edit').modal('hide');
        // Swal.fire(
        //   'Successfully !',
        //   'Product Updated !',
        //   'success'
        // )
        // window.location.reload();
        $('#product-btn-update').text('SAVE');
      }
    });
  }

  detail = (id) => {
    $('#detail').modal('show');
    let fd = new FormData();
    fd.append('id', id);
    $.ajax({
      type: "POST",
      url: `${baseUrl}/admin/products/detail`,
      cache: false,
      contentType: false,
      processData: false,
      data: fd,
      // beforeSend: function (xhr) {
      //   xhr.setRequestHeader("Authorization", `Bearer ${token}`);
      //   xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
      //   xhr.setRequestHeader("Content-Type", "application/json");
      // },
      success: function(data) {
        let result = JSON.parse(data)
        $("#detail_product_code").text(result.product.product_code);
        $("#detail_product_name").text(result.product.name);
        $("#detail_product_image").attr('src', `https://api2.kepasar.co.id${result.product.images}`);
        $("#detail_product_description").text(result.product.descriptions);
        $("#detail_product_price").text(result.product.price);
        $("#detail_product_stock").text(result.product.stock);
        $("#detail_product_weight").text(result.product.weight);
        $("#detail_product_unit").text(result.product.unit);
        $("#detail_product_category").text(result.product.category.name);
        if(result.product.published === true) {
          let textPublished = "Yes";
          $("#detail_product_published").text(textPublished);
        } else {
          let textPublished = "No";
          $("#detail_product_published").text(textPublished);
        }
      }
    });
  }


  $('#edit_input_file_product_image').on('change', function() {
    let filename = $('#edit_input_file_product_image').val();
    let uniqueImg = new Date().getTime()
    let parts = filename.split('.');
    let ext = parts[parts.length - 1];
    let reader = new FileReader();
    let image = $('#edit_input_file_product_image')[0].files[0];  
    reader.onload = function(e) {
      $('#product_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(image);
  });

  $('#create_input_file_product_image').on('change', function() {
    let filename  = $('#create_input_file_product_image').val();

    let uniqueImg = new Date().getTime()
    let parts = filename.split('.');
    let ext = parts[parts.length - 1];
    let reader = new FileReader();
    let image = $('#create_input_file_product_image')[0].files[0];  
    reader.onload = function(e) {
      $('#create_preview_product_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(image);
  });

  logout = async () => {
    Swal.fire({
      title: 'Are you sure want to logout?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then( async (result) => {
      if (result.value) {
        await $.ajax({
          type: "POST",
          url: `${baseUrl}/admin/auth/logout`,
          success: function(data) {
            window.location.reload();
          }
        });
      }
    });
  }


  // Category 

  createCategory = () => {
    $('#storeCategory').modal('show');
  }

  storeCategory = async () => {
    let categoryName = $('#create_category_name').val();
    let categoryDescription = $('#create_category_description').val();
    $('#category-btn-store').text('PROCESS');
    await $.ajax({
      type: "POST",
      url: `https://api2.kepasar.co.id/product-service/category`,
      data: JSON.stringify({
        category_name: categoryName,
        description: categoryDescription,
      }),  
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $('#storeCategory').modal('hide');
        Swal.fire(
          'Successfully !',
          'Category Created !',
          'success'
        )
        window.location.reload();
        $('#category-btn-store').text('SAVE');
      }
    });
  }

  detailCategory = async (id) => {
    $("#detailCategory").modal('show');
    await $.ajax({
      type: "GET",
      url: `https://api2.kepasar.co.id/product-service/category/${id}`,
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $("#detail_category_name").text(data.data.category_name);
        $("#detail_category_description").text(data.data.description)
      }
    });
  }

  deleteCategory = async (id) => {
    Swal.fire({
      title: 'Are you sure want to delete?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then( async (result) => {
      if (result.value) {
        await $.ajax({
          type: "DELETE",
          url: `https://api2.kepasar.co.id/product-service/category/${id}`,
          beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", `Bearer ${token}`);
            xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
            xhr.setRequestHeader("Content-Type", "application/json");
          },
          success: function(data) {
            Swal.fire(
              'Successfully !',
              'Category Deleted !',
              'success'
            )
            window.location.reload();
          }
        });
      }
    });
  }

  editCategory = async (id) => {
    $('#editCategory').modal('show');
    await $.ajax({
      type: "GET",
      url: `https://api2.kepasar.co.id/product-service/category/${id}`,
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $("#edit_category_name").val(data.data.category_name);
        $("#edit_category_description").val(data.data.description);
      }
    });
  }

  updateCategory = async (id) => {
    let productCategory = $('#edit_category_name').val();
    let productCategoryDescription = $('#edit_category_description').val();
    $('#category-btn-update').text(`PROCESS`);
    await $.ajax({
      type: "PATCH",
      url: `https://api2.kepasar.co.id/product-service/category/${id}`,
      data: JSON.stringify({
        category_name: productCategory,
        description: productCategoryDescription
      }),  
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $('#editCategory').modal('hide');
        Swal.fire(
          'Successfully !',
          'Category Updated !',
          'success'
        )
        window.location.reload();
        $('#category-btn-update').text('SAVE');
      }
    });
  }

</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/adminLTE-3/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('public/adminLTE-3/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('public/adminLTE-3/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('public/adminLTE-3/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('public/adminLTE-3/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- Jquery Lazy -->
<script src="<?= base_url('public/adminLTE-3/plugins/jquery-lazy/jquery.lazy.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('public/adminLTE-3/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('public/adminLTE-3/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('public/adminLTE-3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('public/adminLTE-3/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- Sweetalert 2 -->
<script src="<?= base_url('public/adminLTE-3/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('public/adminLTE-3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/adminLTE-3/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('public/adminLTE-3/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('public/adminLTE-3/dist/js/demo.js') ?>"></script>

</body>
</html>