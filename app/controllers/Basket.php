<?php
    require 'app/util/Csrf.php';
    class Basket extends Controller {
       
        public function index() {

            Csrf::generate();

            $data = [];
            $cart = $this->model("BasketModel");
            if(isset($_POST['item_id'])){
                if (!Csrf::verify($_POST['csrf_token'])) {
                    die('Помилка CSRF захисту');
                }
                $cart->addToCart($_POST['item_id']);
            }             
         
            if(!$cart->isSetSession() || count($cart->getSession()) == 0)
                $data['empty'] = 'Кошик порожній';
            else{
                $products = $this->model('Products');
                $data['products'] = $products->getProductsCart($cart->getSession());
            }
            $data['csrf_token'] = $_SESSION['csrf_token'];
            return $this->view('basket/index', $data);
        }

        public function confirm() {
            if (!Csrf::verify($_POST['csrf_token'])) {
                die('Помилка CSRF захисту');
            }
            
           require 'vendor/autoload.php';
            \Cloudipsp\Configuration::setMerchantId(1396424);
            \Cloudipsp\Configuration::setSecretKey('test');

            $checkoutData = [
                'currency' => 'UAH',
                'amount' => $_POST['amount'] *100,
                'order_desc' => 'Придбання товарів на сайті shop.diakonov-it.com.ua'
            ];
            $data = \Cloudipsp\Checkout::url($checkoutData);
            $url = $data->getUrl();
            $data->toCheckout();
        }

        public function delete_all(){
            if (!Csrf::verify($_POST['csrf_token'])) {
                die('Помилка CSRF захисту');
            }
            $cart = $this->model("BasketModel");
            $cart->deleteSession();
            Csrf::generate();

            return $this->view('basket/index', ['csrf_token' => $_SESSION['csrf_token'], 'empty' => 'Кошик порожній']);
        }

        public function delete($id){
            if (!Csrf::verify($_POST['csrf_token'])) {
                die('Помилка CSRF захисту');
            }
            $cart = $this->model("BasketModel");
            $cart->deleteById($id);
            Csrf::generate();
           
           header("Location: /basket");
           exit;
        }
    }