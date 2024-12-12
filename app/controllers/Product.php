<?php
    require 'app/util/Csrf.php';
   class Product extends Controller {
       public function index($id) {

        $data=[];
           $product = $this->model('Products');
           $data['product'] = $product->getOneProduct($id);
           $data['csrf_token'] = Csrf::generate();
           $this->view('product/index', $data);
       }
   }