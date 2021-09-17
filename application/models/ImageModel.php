<?php 
class ImageModel extends CI_Model {
    
    public function addImages($data){
        $this->db->insert('images',$data);
    }

    public function getImages($product_id){
        $images = $this->db->query("select * from images where product_id = '$product_id'")->result_array();
        dd($images);
        return $images;
    }

}
?>