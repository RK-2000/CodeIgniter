<?php

class ProductControl extends CI_Controller{
    
    public function index(){
        if($this->input->server('REQUEST_METHOD') == "POST"){
            //Add product detail to model
            $product_name = $this->input->post('product_name');
            $product_desc = $this->input->post('product_desc');
            $product_cost = $this->input->post('product_cost');
            $product_image = $this->input->post('product_image');
            $user_id = $this->session->userdata('user_id');

            $total_images = count($_FILES['image']['name']);
            $config['upload_path'] = "./uploads/";  
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload',$config);
            for($i=1;$i<$total_images;$i++){
                
                $_FILES['img']['name'] = $_FILES['image']['name'][$i];
                $_FILES['img']['type'] = $_FILES['image']['type'][$i];
                $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                $_FILES['img']['size'] = $_FILES['image']['size'][$i];
                $_FILES['img']['error'] = $_FILES['image']['error'][$i];
                if($this->upload->do_upload('img')){
                        // Add images
                }else{
                    dd($this->upload->display_errors());
                }
            }
            
            
        
        }
        $this->load->view("UploadImage");
    }    
}

?>