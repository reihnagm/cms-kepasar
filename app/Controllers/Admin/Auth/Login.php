<?php 
namespace App\Controllers\Admin\Auth;
use App\Controllers\Base\BaseController;
use Config\Services;

class Login extends BaseController 
{
  public function index() {
    return view('login/index');
  }

  public function store() {
    $data = array();
      
		$session = Services::session();
		$request = Services::request();
			
		$username = $request->getPost('username');
    $password = $request->getPost('password');
  
    $fields = [
      "username" => $username, 
      "password" => $password
    ];
    $result = curlHelper('https://api2.kepasar.co.id/user-service/login', 'POST', $fields);
    $data["success"] = false;
    if($result->status === "ok") {
      $data['token'] 		     = $result->token;
      $data['refresh_token'] = $result->refresh_token;
      $data['full_name']	   = $result->user->full_name;
      $data['username']	     = $result->user->username;
      $data['short_bio']	   = $result->user->short_bio;
      $data['avatar_url']	   = $result->user->avatar_url;
      $data['phone']		     = $result->user->phone;
      $data['auth_key']	     = $result->user->auth_key;
      $data['created_at']	   = $result->user->created_at;
      $data['updated_at']	   = $result->user->updated_at;
      $data['links']		     = [
        'self' => $result->user->links->self
      ];
      $session->set($data);
      $data["success"] = true;
      return redirect()->to('admin/dashboard');
    } else {
      return redirect()->to(base_url('/'));
    }
  }
}