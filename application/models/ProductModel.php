<?php
    class ProductModel extends CI_Model {

        
        public function addProduct($data)
        {
            if($this->db->insert('products',$data)){
                return true;
            }
            else{
                return false;
            }
        }

        public function fetch_product_id($name)
        {
            $id = $this->db->query("select product_id from products where product_name = '$name';");
        return $id->result_array()[0]['product_id'] ;
        }

        public function get_total_products($user_id){
            $count = $this->db->query("select count(product_name) from products where user_id = '$user_id';")->result_array();
            return $count[0]['count(product_name)'];
        }

        public function get_products($user_id,$first,$last){
            $products = $this->db->query("select * from products where user_id = '$user_id' limit $first , $last;")->result_array();
            if(!empty($products)){
                return $products;
            }
        }
    }
?>