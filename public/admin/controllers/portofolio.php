<?php

class portofolio extends Controller
{
          public function index()
          {
                    echo "ini controller poertofolio";
                    $this->view('portofolio/index');
                    $data['profile'] = $this->model('portofolioModel');

                    $this->view('portofolio/index',$data);
          }
}
