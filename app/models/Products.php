<?php
    require 'DB.php';
    class Products {
        private $_db=null;

        public function __construct() {
            $this->_db = DB::getInstance();
        }
        public function getProducts() {
            $sql = "SELECT * FROM products ORDER BY id DESC";
            $query = $this->_db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsLimited($order, $limit) {
            $sql = "SELECT * FROM products ORDER BY $order DESC LIMIT $limit";
            $result = $this->_db->query($sql); 
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsCategory($category) {
            $sql = "SELECT * FROM products WHERE category = ? ORDER BY id DESC";
            $query = $this->_db->prepare($sql);
            $query->execute([$category]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOneProduct($id){
            $sql = "SELECT * FROM products WHERE id = ?";
            $query = $this->_db->prepare($sql);
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function getProductsCart($items){
            if (empty($items)) 
                return []; 
            $items = array_values($items); 
            $placeholders = rtrim(str_repeat('?, ', count($items)), ', ');
            $sql = "SELECT * FROM products WHERE id IN ($placeholders)";
            $query = $this->_db->prepare($sql);
            $query->execute($items);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function countPagesOfProducts() {
            $sql = "SELECT COUNT(*) FROM products";
            $query = $this->_db->prepare($sql);
            $query->execute();
            $dbRecords = $query->fetch(PDO::FETCH_NUM);
            return ceil($dbRecords[0]/3);
        }

        public function getPaginatedProducts($page) {
            $offsetItems = (int)(3 * $page); 
            $sql =  $offsetItems > 0
                ? "SELECT * FROM products ORDER BY id DESC LIMIT 3 OFFSET $offsetItems"
                : "SELECT * FROM products ORDER BY id DESC LIMIT 3";
            $query = $this->_db->prepare($sql);
            $query->execute(); 
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }


    }