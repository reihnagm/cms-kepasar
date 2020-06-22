<?php 

function allProduct() {
  helper('curl');
  $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
  return $result;  
}
function totalProduct() {
  helper('curl');
  $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
  $totalProduct = count($result->products);
  return $totalProduct;  
}
function allCategories() {
  helper('curl');
  $data = [];
  $result = curlHelper('https://api2.kepasar.co.id/product-service/category', 'GET');
  if(isset($result->categories)) {
    $data = $result->categories;
  }
  return $data;
}


