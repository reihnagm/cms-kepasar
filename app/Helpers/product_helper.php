<?php 

function allProduct() {
  helper('curl');
  $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
  return $result;  
}

function totalProducts() {
  helper('curl');
  $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
  $total = count($result->products);
  return $total;  
}

function allCategories() {
  helper('curl');
  $data = [];
  $result = curlHelper('https://api2.kepasar.co.id/product-service/category', 'GET');

  // if(count($result->categories) === 1) {
  //   $data = $result->categories;
  // }
  return $data;
}

function totalProduct() {
  helper('curl');
  $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
  $totalProduct = count($result->products);
  return $totalProduct;  
}
