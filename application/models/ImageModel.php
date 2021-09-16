<?php 
class ImageModel extends CI_Model {
    public function addImages($data){
        $this->db->insert('images',$data);
    }
}
?>