<?php

class ProductControl extends CI_Controller {
    
    public function index(){
        if (!is_authenticated()){
            redirect(base_url()."login");
        }
        $this->load->view("UploadProduct");
    }
    
    public function addProduct(){
        if(count($this->input->post()) > 0){
            
            // Config for images
            $total_images = count($_FILES['image']['name']);
            $config['upload_path'] = "./uploads/";  
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            $data = array();
            // Validate Form data
            
            $this->form_validation->set_rules('product_name','Product Name','required|is_unique[products.product_name]');
            $this->form_validation->set_rules('product_desc','Product Description','required');
            $this->form_validation->set_rules('product_cost','Product Cost','required|numeric|greater_than[0]');
            if($this->form_validation->run() == false){
                $this->session->set_flashdata("error",validation_errors());
                redirect(base_url()."addProduct");
            }
            //Add Main image
            $_FILES['img']['name'] = $_FILES['image']['name'][0];
            $_FILES['img']['type'] = $_FILES['image']['type'][0];
            $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'][0];
            $_FILES['img']['size'] = $_FILES['image']['size'][0];
            $_FILES['img']['error'] = $_FILES['image']['error'][0];
            if($this->upload->do_upload('img')){
                $image_data = $this->upload->data();
                $data['product_image'] = $image_data['file_name'];
            }
            else{
                $this->session->set_flashdata("error",$this->upload->display_errors());  
            }

            //Add product detail to model
            $data['product_name'] = $this->input->post('product_name');
            $data['product_desc'] = $this->input->post('product_desc');
            $data['product_cost'] = $this->input->post('product_cost');
            $data['user_id'] = $this->UserModel->fetch_userid($this->session->userdata('email'));
            $res = $this->ProductModel->addProduct($data);
            if(!$res){
                $this->session->set_flashdata("error","Something went wrong !!");
                redirect(base_url()."addProduct");
            }
            $product_id = $this->ProductModel->fetch_product_id($data['product_name']);
            
            //Save Multiple images 
            for($i=1;$i<$total_images;$i++){     
                $_FILES['img']['name'] = $_FILES['image']['name'][$i];
                $_FILES['img']['type'] = $_FILES['image']['type'][$i];
                $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                $_FILES['img']['size'] = $_FILES['image']['size'][$i];
                $_FILES['img']['error'] = $_FILES['image']['error'][$i];
                if($this->upload->do_upload('img')){
                    $image_data = $this->upload->data();
                    $file = array(
                        'url'=>$image_data['file_name'],
                        'product_id'=>$product_id
                    );
                    $this->ImageModel->addImages($file);
                }else{
                    $this->session->set_flashdata("error",$this->upload->display_errors());
                    redirect(base_url()."addProduct");                }
            }
            
            //Product and images added successfully
            $this->session->set_flashdata("success","Product Added Successfully");
            redirect(base_url()."addProduct"); 
            
        
        }
    }

    public function productGallery(){
        if (!is_authenticated()){
            redirect(base_url()."login");
        }
        $user_id = $this->session->userdata('id');
        $limit_per_page = 3;
        $total_products = $this->ProductModel->get_total_products($user_id);
        if($total_products==0){
            message('error','Please add some products');
            redirect(base_url()."addProduct");
        }
        $number_of_pages = ceil($total_products/$limit_per_page);


        if(empty($this->input->get('page'))){
            $page = 1;
        }
        else{
            $page = $this->input->get('page');
            if($page>$number_of_pages){
                $page=$number_of_pages;
            }
            if($page<1){
                $page=1;
            }
        }

        $first = ($page-1) * $limit_per_page;
        $data['result'] = $this->ProductModel->get_products($user_id,$first,$limit_per_page);
        $data['number_of_pages'] = $number_of_pages;
        $data['page'] = $page;
        $this->load->view("ProductGallery",$data);  
    }

    public function viewProducts(){
        if(!is_authenticated()){
            redirect(base_url()."login");
        }
        $this->load->view("ViewProduct");
    }
    
}

?>