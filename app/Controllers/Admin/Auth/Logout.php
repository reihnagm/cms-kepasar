<?php 
namespace App\Controllers\Admin\Auth;
use App\Controllers\Base\BaseController;
use Config\Services;
class Logout extends BaseController 
{
  public function logout() {
    $session = Services::session();
    $session->remove('token');
    $session->remove('refresh_token');
    $session->remove('full_name');
    $session->remove('username');
    $session->remove('short_bio');
    $session->remove('avatar_url');
    $session->remove('phone');
    $session->remove('auth_key');
    $session->remove('created_at');
    $session->remove('updated_at');
    $session->remove('links');
  }
}