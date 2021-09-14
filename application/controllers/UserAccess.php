<?php 
class UserAccess extends CI_Controller {
    
    public function index(){
        
        if ($this->session->userdata('email')!=NULL){
            // dd($this->session->userdata());
            $this->load->view('Home'); 
        }
        else{
            redirect(base_url()."login");
        }
     }

     public function logout(){
        $unset_items=array('name','email','password');
        $this->session->unset_userdata($unset_items);
        redirect(base_url()."login");
     }
}
?>