<?php 
namespace App\Controllers\Admin\Category;
use App\Controllers\Base\BaseController;

class Category extends BaseController 
{
  public function index() 
  {
    $data = array();
   
    $result = curlHelper('https://api2.kepasar.co.id/product-service/category', 'GET');
    $data["success"] = false;
    if($result->status === "ok") {
      $data["success"] = true;
      $data["categories"] = $result->categories;
      return view('category/index', $data);
    }      
  }
}