<?php 
class UserAccess extends CI_Controller {
    
    public function index(){
        
        if (empty($this->session->userdata('email'))){
            redirect(base_url()."login");
        }
        $this->load->view('Home');
     }

     public function logout(){
        $unset_items=array('__ci_last_regenerate','id','name','email','password');
        $this->session->unset_userdata($unset_items);
        redirect(base_url()."login");
     }
}
?>