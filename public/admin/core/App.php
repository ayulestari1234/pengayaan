<?php

class App{
  protected $controller ='prtofolio'; //controller default
  protected $method     ='index';     //method default
  protected $params     ='[]';       //parameter default

  
 public function __construct()
 {

  $Url= $this->parseURL();  

  //pemanggilan controller
  if(file_exists('../admin/controllers/'.$Url[0].'.php')) {
    $this->controller=$Url[0];
    unset($url[0]);
  }
  require_once '../admin/controller/'.$this->controller.'.php';
  $this->controller = new $this->controller;

  //pemanggilan method
  if(isset($url[1])) {
    if(method_exists($this->controller,$url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }
  }

  //paramenters
  if(!empty($url)) {
    $this->params = array_values($url);
  }

  //jalankan controlller & method,serta kirim parameter jika ada
  call_user_func_array([$this->controller,$this->method],$this->params);
 }
public function parseURL()
{
          if(isset($_GET['url'])) {
           //menghilangkan garis miring(/) di akhir url
           $url = rtrim($_GET['url'],'/');
           //menghilangkan karakter aneh atau karakter yang memungkinkan kita di hack
           $url= filter_var($url,FILTER_SANITIZE_URL);

           //menghilangkan tanda garis miring (/) dan mengambil setring-nya.
           $url=explode('/',$url);
           return $url;
          }
        }
      }
  