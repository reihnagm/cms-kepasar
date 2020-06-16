<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class isLoggedIn implements FilterInterface
{
  public function before(RequestInterface $request)
  {
    if(!session('token')) {
      return redirect()->to(base_url('admin/auth/login'));
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response)
  {
    if(session('token')) {
      return redirect()->to(base_url('admin'));
    }
  }
}