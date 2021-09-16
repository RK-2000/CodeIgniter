<?php
    class ProductModel extends CI_Model {

        
        public function addProduct($data){
            if($this->db->insert('products',$data)){
                return true;
            }
            else{
                return false;
            }
        }

        public function fetch_product_id($name){
            $id = $this->db->query("select product_id from products where product_name = '$name';");
        return $id->result_array()[0]['product_id'] ;
        }
    }
?>