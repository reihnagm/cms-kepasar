<?php
use Config\Services;

function curlHelper($url = '', $method = 'GET', $fields = []) {
  $curl = curl_init();
  $session = Services::session();
  $token = NULL;
  if($session->has('token')) {
    $token = $session->get('token');
  }
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
  if($method === 'POST' || $method === 'PUT') {
    $template = "";
    $values = $fields;
    $keys = array_keys($fields);
    for ($i = 0; $i < count($keys); $i++) { 
      $template .= $keys[$i].'='.$values[$keys[$i]].'&';
      $query_string = substr($template, 0, -1);
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS, $query_string);
  }
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    $token !== NULL || "" ? 'Authorization: Bearer '.$token : 'Content-Type : application/json',
  ]); /* NOTICE : Penulisan 'Authorization: Bearer' titik koma ':' tidak boleh diberi spasi 
   seperti ini 'Authorization : Bearer' */
   /* NOTICE : Penulisan 'Content-Type : application/json' titik koma ':' harus diberi spasi 
   seperti ini 'Content-Type : application/json' */
  $result = curl_exec($curl);
  $resultDecoded = json_decode($result);
  curl_close($curl); 
  return $resultDecoded;
}



function curlImageHelper($url, $data){
  $session = Services::session();
  $token = $session->get('token');
  $headers = ["Content-Type : application/json", "Authorization: Bearer ".$token]; 
  $postfields = [
    "tags" => "test",
    "file" => curl_file_create($data['file']['tmp_name'], $data['file']['type'], basename($data['file']['name']))
  ];
  $curl = curl_init();
  $options = [
    CURLOPT_URL => $url,
    CURLOPT_POSTFIELDS => $postfields,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true
  ]; 
  curl_setopt_array($curl, $options);
  $result = curl_exec($curl);
  $decoded = json_decode($result);
  return $decoded;
}