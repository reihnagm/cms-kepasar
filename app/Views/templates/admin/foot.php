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
    let productCategory = $("#create_category_select").val();  
    let productPublished = $("#create_product_published").val();
    let productCode =  $("#create_product_code").val();
    let productName = $("#create_product_name").val();
    let productDescription = $("#create_product_description").val();
    let productPrice = $("#create_product_price").val();
    let productSpecialPrice = $("#create_product_special_price").val();
    let productWeight = $("#create_product_weight").val();
    let productMeasurementUnit = $("#create_product_measurement_unit").val();
    let productStock = $("#create_product_stock").val();
    // $.ajax({
    //   type: "POST",
    //   url: `https://api2.kepasar.co.id/product-service/product-master`,
    //   data: JSON.stringify({
    //     category_id: productCategory,
    //     product_code: productCode,
    //     product_name: productName,
    //     description: productDescription,
    //     price: productPrice,
    //     special_price: 0,
    //     discount_type: 0,
    //     weight: productWeight,
    //     measurement_unit: productMeasurementUnit,
    //     stock: productStock,
    //     adult_only: false,
    //     published: productPublished,
    //     tags: "Cabe Rawit",
    //     meta_data: "sayur, cabe"
    //   }),  
    //   beforeSend: function (xhr) {
    //     xhr.setRequestHeader("Authorization", `Bearer ${token}`);
    //     xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
    //     xhr.setRequestHeader("Content-Type", "application/json");
    //   }, 
    //   success: function(data) {
    //     $('#store').modal('hide');
    //     Swal.fire(
    //       'Successfully !',
    //       'Product Created !',
    //       'success'
    //     )
    //     window.location.reload();
    //     $('#product-btn-store').text('CREATE');
    //   }
    // });
  }

  detail = (uid) => {
    $('#detail').modal('show');
    $.ajax({
      type: "GET",
      url: `https://api2.kepasar.co.id/product-service/product-master/${uid}`,
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $("#detail_product_code").text(data.product.product_code);
        $("#detail_product_name").text(data.product.name);
        $("#detail_product_image").attr('src', `https://api2.kepasar.co.id${data.product.images}`);
        $("#detail_product_description").text(data.product.descriptions);
        $("#detail_product_price").text(data.product.price);
        $("#detail_product_stock").text(data.product.stock);
        $("#detail_product_weight").text(data.product.weight);
        $("#detail_product_unit").text(data.product.unit);
        $("#detail_product_category").text(data.product.category.name);
        if(data.product.published === true) {
          let textPublished = "Yes";
          $("#detail_product_published").text(textPublished);
        } else {
          let textPublished = "No";
          $("#detail_product_published").text(textPublished);
        }
      }
    });
  }

 edit = async (uid) => {
    $('#edit').modal('show');
    $.ajax({
      type: "GET",
      url: `https://api2.kepasar.co.id/product-service/product-master/${uid}`,
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $("#category_select option").filter(function() {
          return $(this).val() === data.product.category.id;
        }).prop('selected', true);
        $("#published_select option").filter(function() {
          return $(this).val() === data.product.published;
        }).prop('selected', true);
        $("#product_id").val(data.product.id);
        $("#product_code").val(data.product.product_code);
        $("#product_name").val(data.product.name);
        $("#product_image").attr('src', `https://api2.kepasar.co.id${data.product.images}`);
        $("#product_description").val(data.product.descriptions);
        $("#product_price").val(data.product.price);
        $("#product_price_discount").val(data.product.price_discount);
        $("#product_stock").val(data.product.stock);
        $("#product_weight").val(data.product.weight);
        $("#product_measurement_unit").val(data.product.unit);
      }
    });
  }

  $('#photo').on('change', function() {
    var filename  = $('#photo').val();
    var uniqueImg = new Date().getTime()
    var parts = filename.split('.');
    var ext = parts[parts.length - 1];
    if (!isImage(ext)) {
        swal('error', 'File bukan gambar!', 'error');
    } else {
        var photo = $('#photo')[0].files[0];
        var form = new FormData();
        form.append('photo', photo);
        $.ajax({
            url: '/user/upload/photo/profile',
            data: form,
            type: 'POST',
            contentType: false, // FIX : ILLEGAL INVOCATION IMG
            processData: false, // FIX : ILLEGAL INVOCATION IMG
            cache: false, // FIX : ILLEGAL INVOCATION IMG
            success: function(data) {
                swal("Berhasil", "Foto Profil berhasil diubah!", "success")
                $('#photo_profile').attr('src',"/uploads/images/users/"+data.photo+"?"+uniqueImg);
            },
            error: function(data) {
                swal("Gagal", "Foto Profil berhasil diubah!", "error")
            }
        });
    }
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
    })
  }

  update = async () => {
    let productCategory = $('#category_select').val();
    let productPublished = $('#published_select').val();
    let productId = $('#product_id').val();
    let productCode = $('#product_code').val();
    let productName = $('#product_name').val();
    let productDescription = $('#product_description').val();
    let productPrice = $('#product_price').val();
    let productPriceDiscount = $('#product_price_discount').val();
    let productStock = $('#product_stock').val();
    let productWeight = $('#product_weight').val();
    let productMeasurementUnit = $('#product_measurement_unit').val();
    $('#product-btn-update').text(`PROCESS`);
    await $.ajax({
      type: "PUT",
      url: `https://api2.kepasar.co.id/product-service/product-master/${productId}`,
      data: JSON.stringify({
        category_id: productCategory,
        product_code: productCode,
        product_name: productName,
        description: productDescription,
        price: productPrice,
        special_price: 0,
        discount_type: 0,
        weight: productWeight,
        measurement_unit: productMeasurementUnit,
        stock: productStock,
        adult_only: false,
        published: productPublished,
        tags: "Cabe Rawit",
        meta_data: "sayur, cabe"
      }),  
      beforeSend: function (xhr) {
        xhr.setRequestHeader("Authorization", `Bearer ${token}`);
        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
        xhr.setRequestHeader("Content-Type", "application/json");
      },
      success: function(data) {
        $('#edit').modal('hide');
        Swal.fire(
          'Successfully !',
          'Product Updated !',
          'success'
        )
        window.location.reload();
        $('#product-btn-update').text('SIMPAN');
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
