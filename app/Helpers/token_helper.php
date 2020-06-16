<?php 
use Config\Services;
  function getToken() {
    $session = Services::session();
    return $session->get('token');
  }
?>