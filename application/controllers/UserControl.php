<?php 
class UserControl extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        if($this->input->server('REQUEST_METHOD')=="POST"){
            $formValues = array();
            $formValues['name'] = $this->input->post('name');
            $formValues['email'] = $this->input->post('email');    
            $formValues['password'] = $this->input->post('password');
            $r_password = $this->input->post('r_password');
            $users = $this->UserModel->search_user($formValues['email']);
            if(count($users) == 0)
            {
                if($formValues['password'] == $r_password){
                    $this->UserModel->create_user($formValues);
                    $this->session->set_userdata($formValues);

                    redirect(base_url()."home");
                }
                else{
                    $this->session->userdata('message','<div class=\'alert alert-danger\'> Password didn\'t match </div>');
                    
                }
            }
            else{
                $this->session->userdata('message','<div class=\'alert alert-danger\'>An account has been made using this email</div>');
            }
        }
        $data=array();
        if($this->session->flashdata('message')){
            $data['message'] = $this->session->userdata('message');
        }
        $this->load->view('RegisterUser',$data);
    }


    public function login(){

        if($this->input->server('REQUEST_METHOD')=="GET"){
            if ($this->session->userdata('email')!=NULL){
                redirect(base_url()."home");
            }else {
                $this->load->view('LoginUser');
            }
        }
        else{
            $formValues=array();
            $formValues['email']=$this->input->post('email');
            $formValues['password']=$this->input->post('password');
            $users = $this->UserModel->search_user($formValues['email']);
            if(count($users) == 1){
                $user = $this->UserModel->check_password($formValues['email'],$formValues['password']);
                if(count($users)==1){
                    $this->session->set_userdata($user[0]);
                    // dd($this->session->userdata());
                    redirect(base_url()."home");
                }
                
            }
            else{
                dd("User not found");
            }
        }
    }
}
    
?>