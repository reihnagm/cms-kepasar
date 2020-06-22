<?php 
namespace App\Controllers\Admin\Product;
use App\Controllers\Base\BaseController;
use Config\Services;

class Product extends BaseController
{
  
  
	public function index()
	{
    $data = array();
   
    $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
    $data["success"] = false;
    
    if($result->status === "ok") {
      $data["success"] = true;
      $data["products"] = $result->products;
      return view('product/index', $data);
    }      
	}

  // STORE
  public function store() {
    $request = Services::request();

    $catId = $request->getPost('catId');
    $code  = $request->getPost('code');
    $name  = $request->getPost('name');
    $desc  = $request->getPost('desc');
    $img   = $request->getFile('img');
    $dimensions = $request->getPost('dimensions');
    $price = $request->getPost('price');
    $specialPrice =  $request->getPost('specialPrice');
    $disctype = $request->getPost('priceDiscount');
    $weight = $request->getPost('weight');
    $unit = $request->getPost('unit');
    $stock = $request->getPost('stock');
    $published = $request->getPost('published');
    $adult = $request->getPost('adult');
    $tags = $request->getPost('tags');
    $metaData = $request->getPost('metaData');
    if(isset($_FILES['img'])) {
      $fields1 = [
        "tags" => $tags,
        "file" => $_FILES['img']
      ];
      $result1 = curlImageHelper('https://api2.kepasar.co.id/media-service/upload', $fields1);
    }
  
    $fields2 = [
      "category_id" => $catId,
      "product_code" => $code,
      "product_name" => $name,
      "description" => $desc,
      "images" => isset($_FILES['img']) ? $result1->data->download->actual : '',
      "price" => $price,
      "special_price" => $specialPrice,
      "discount_type" => $disctype,
      "weight" => $weight,
      "dimensions" => $dimensions,
      "measurement_unit" => $unit,
      "stock" => $stock,
      "adult_only" => $adult,
      "published" => $published,
      "tags" => $tags,
      "meta_data" => $metaData
    ];
    die(var_dump($fields2));
    // $result2 = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'POST', $fields2);
  }

  // UPDATE 
  public function update() {
    $request = Services::request();

    $catId = $request->getPost('catId');
    $id = $request->getPost('id');
    $code = $request->getPost('code');
    $name = $request->getPost('name');
    $desc = $request->getPost('desc');
    $img = $request->getFile('img');
    $dimensions = $request->getPost('dimensions');
    $price = $request->getPost('price');
    $specialPrice =  $request->getPost('specialPrice');
    $disctype = $request->getPost('priceDiscount');
    $weight = $request->getPost('weight');
    $unit = $request->getPost('unit');
    $stock = $request->getPost('stock');
    $published = $request->getPost('published');
    $adult = $request->getPost('adult');
    $tags = $request->getPost('tags');
    $metaData = $request->getPost('metaData');
    if(isset($_FILES['images'])) {
      $fields1 = [
        "tags" => $tags,
        "file" => $_FILES['img']
      ];
      $result1 = curlImageHelper('https://api2.kepasar.co.id/media-service/upload', $fields1);
    }
  
    $fields2 = [
      "category_id" => $catId,
      "product_code" => $code,
      "product_name" => $name,
      "description" => $desc,
      "images" => isset($_FILES['img']) ? $result1->data->download->actual : '',
      "price" => $price,
      "special_price" => $specialPrice,
      "discount_type" => $disctype,
      "weight" => $weight,
      "dimensions" => $dimensions,
      "measurement_unit" => $unit,
      "stock" => $stock,
      "adult_only" => $adult,
      "published" => $published,
      "tags" => $tags,
      "meta_data" => $metaData
    ];
    $result2 = curlHelper('https://api2.kepasar.co.id/product-service/product-master/'.$id, 'PUT', $fields2);
  }

  // public function datatables() 
  // {
  //   $columns = [
  //     0 => "No",
  //     1 => "UID",
  //     2 => "Name",
  //     3 => "Price",
  //     5 => "Weight",
  //     4 => "Stock"
  //   ];

  //   $request = Services::request();

  //   $order = $columns[$request->getGet('order')[0]["column"]];
  //   $dir = $request->getGet('order')[0]["dir"];
    
  //   $draw 	= $request->getGet("draw");
		// $start 	= $request->getGet("start");
		// $length = $request->getGet("length");
  //   $search = $request->getGet("search")["value"];
    
  //   if(!empty($search)) {
  //     $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master?q='.$search, 'GET');
  //     if($length > 0) {
  //       $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master?q='.$search.'&limit='.$length.'&offset='.$start, 'GET');
  //     }
  //     $products = $results;
  //   } else {
  //     $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
  //     if($length > 0) {
  //       $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master?limit='.$length.'&offset='.$start, 'GET');
  //     }
  //     $products = $results;
  //   }
  //   $data = [];
  //   $index = 1;
  //   foreach ($products->products as $product): 
  //     $row = [];
  //     $row['No'] = $index++;
  //     $row['UID'] = $product->id;
  //     $row['Name'] = $product->name;
  //     $row['Price'] = $product->price;
  //     $row['Weight'] = $product->weight;
  //     $row['Stock'] = $product->stock;
  //     $data[] = $row;
  //   endforeach;
  //   echo json_encode([
		// 	"draw" => $draw,
		// 	"recordsTotal" => totalProduct(),
		// 	"recordsFiltered" => totalProduct(),
		// 	"data" => $data
		// ]);
  // }
  
}
