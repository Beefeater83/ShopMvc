<?php
   class Categories extends Controller {
       public function index($page=1) {
           $products = $this->model("Products");
           $data = ['totalPages' => $products->countPagesOfProducts(),
                    'products' => $products->getPaginatedProducts($page-1),
                    'title' => 'Всі товари на сайті'
           ];
           $this->view('categories/index', $data);
       }

       public function shoes() {
           $products = $this->model("Products");
           $data = ['products' => $products->getProductsCategory('shoes'), 'title' => 'Категорія взуття'];
           $this->view('categories/index', $data);
       }

       public function hat() {
           $products = $this->model("Products");
           $data = ['products' => $products->getProductsCategory('hat'), 'title' => 'Категорія кепки'];
           $this->view('categories/index', $data);
       }

       public function shirts() {
           $products = $this->model("Products");
           $data = ['products' => $products->getProductsCategory('shirts'), 'title' => 'Категорія футболки'];
           $this->view('categories/index', $data);
       }

       public function watches() {
           $products = $this->model("Products");
           $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Категорія годинники'];
           $this->view('categories/index', $data);
       }
   }
