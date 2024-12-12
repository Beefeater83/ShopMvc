<?php
    
    class BasketModel {
        private $session_name ='cart';
      

        public function isSetSession(){
            return isset($_SESSION[$this->session_name]);
        }
        
        public function deleteSession(){
            unset($_SESSION[$this->session_name]);
        }

        public function getSession(){
            return $_SESSION[$this->session_name];
        }

        public function addToCart($itemID){
            if(!$this->isSetSession())
               $_SESSION[$this->session_name] = [];
            if(!in_array($itemID, $_SESSION[$this->session_name]))
            $_SESSION[$this->session_name][] = $itemID;         
        }

        public function countItems(){
           return $this->isSetSession() ? count($_SESSION[$this->session_name]) : 0;                       
        }

        public function deleteById($id){
            $key = array_search($id, $_SESSION[$this->session_name]);
            if ($key !== false){
                unset($_SESSION[$this->session_name][$key]);
                $_SESSION[$this->session_name] = array_values($_SESSION[$this->session_name]);
                session_write_close();
            }
            
        }
    }