<?php 
namespace App\Controllers\Admin\Product;
use App\Controllers\Base\BaseController;
use Config\Services;

class Product extends BaseController
{

	public function index()
	{
    $data = array();
    // die(var_dump($request->uri->getSegment(1));
   
    $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
    $data["success"] = false;
    
    if($result->status === "ok") {
      $data["success"] = true;
      $data["products"] = $result->products;
      return view('dashboard/productLists', $data);
    }      
	}
	public function store()
	{
	
	}
	public function update($uid)
	{
    die(var_dump($uid));
    // $request = Services::request();
			
		// $productCode = $request->getPost('code');
    // $productName = $request->getPost('name');
    // $productDescription = $request->getPost('description');
    // $productImages = $request->getPost('images');
    // $productDimensions = $request->getPost('dimensions');
    // $productPrice = $request->getPost('price');
    // $productSpecialPrice = $request->getPost('special_price');
    // $productDiscountType = $request->getPost('discount_type');
    // $productWeight = $request->getPost('weight');
    // $productMeasurementUnit = $request->getPost('measurement_unit');
    // $productStock = $request->getPost('stock');
    // $productAdultOnly = $request->getPost('adult_only');
    // $productPublished = $request->getPost('published');
    // $productTags = $request->getPost('tags');
    // $productMetaData = $request->getPost('meta_data');

    // $fields = [
    //   "product_code" => $productCode,
    //   "product_name" => $productName,
    //   "description" => $productDescription,
    //   "images" => $productImages, 
    //   "dimensions" => $productDimensions,
    //   "price" => $productPrice,
    //   "special_price" => $productSpecialPrice,
    //   "discount_type" => $productDiscountType,
    //   "weight" => $productWeight,
    //   "measurement_unit" => $productMeasurementUnit,
    //   "stock" => $productStock,
    //   "adult_only" => $productAdultOnly,
    //   "published" => $productPublished,
    //   "tags" => $productTags,
    //   "meta_data" => $productMetaData
    // ];

    // $result = curlHelper('https://api2.kepasar.co.id/product-service/product-master/'.$uid, 'PUT', $fields);
  }

  public function datatables() 
  {
    $columns = [
      0 => "No",
      1 => "UID",
      2 => "Name",
      3 => "Price",
      5 => "Weight",
      4 => "Stock"
    ];

    $request = Services::request();

    $order = $columns[$request->getGet('order')[0]["column"]];
    $dir = $request->getGet('order')[0]["dir"];
    
    $draw 	= $request->getGet("draw");
		$start 	= $request->getGet("start");
		$length = $request->getGet("length");
    $search = $request->getGet("search")["value"];
    
    if(!empty($search)) {
      $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master?q='.$search, 'GET');
      if($length > 0) {
        $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master?q='.$search.'&limit='.$length.'&offset='.$start, 'GET');
      }
      $products = $results;
    } else {
      $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master', 'GET');
      if($length > 0) {
        $results = curlHelper('https://api2.kepasar.co.id/product-service/product-master?limit='.$length.'&offset='.$start, 'GET');
      }
      $products = $results;
    }
    $data = [];
    $index = 1;
    foreach ($products->products as $product): 
      $row = [];
      $row['No'] = $index++;
      $row['UID'] = $product->id;
      $row['Name'] = $product->name;
      $row['Price'] = $product->price;
      $row['Weight'] = $product->weight;
      $row['Stock'] = $product->stock;
      $data[] = $row;
    endforeach;
    echo json_encode([
			"draw" => $draw,
			"recordsTotal" => totalProducts(),
			"recordsFiltered" => totalProducts(),
			"data" => $data
		]);

  }
  
}
