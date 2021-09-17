<?php 

class UserControl extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        if(is_authenticated()){
            redirect(base_url()."home");
        }
        $this->load->view('RegisterUser');    
    }

    public function register()
    {
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('r_password', 'Re Type', 'required|min_length[6]');
        
        if($this->form_validation->run() == false){
            message("error",validation_errors());
            redirect(base_url());
        }

        if($this->input->post('password') != $this->input->post('r_password')){
            message("error","Re type password and password not matched");
            redirect(base_url());
        }

        $data = array(
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
        );
        $insert = $this->UserModel->create_user($data);
        if(!$insert){
            message("error","Something went wrong");
            redirect(base_url());
        }   
        
        message("success","Hello ".$data['name']);
        $this->session->set_userdata($data);
        redirect(base_url()."home");
        
    }


    public function login(){
        if(is_authenticated()){
            redirect(base_url()."home");
        }
        $this->load->view('LoginUser'); 
    }

    public function loginUser(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        //Form Validation
        if($this->form_validation->run() == false){
            $this->session->set_flashdata("error",validation_errors());
            redirect(base_url());
        }

        $email=$this->input->post('email');
        $password=$this->input->post('password');

        // Check whether user is present in database
        $response = $this->UserModel->search_user($email);
        if(!$response){
            $this->session->set_flashdata("error","No user found with this email!");
            redirect(base_url()."login");
        }
        if(!password_verify($password, $response['password'])){
            $this->session->set_flashdata("error","Incorrect Password!");
            redirect(base_url()."login");
        }
        
        message("success","Hello ".$response['name']);
        $this->session->set_userdata($response);
        redirect(base_url()."home");

    }
}
    
?>