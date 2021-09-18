<?php 
class Datatable extends CI_Controller {
    public function index(){
        $data=array();
        $data['users'] = $this->UserModel->get_all_user();
        $this->load->view("Datatable",$data);
    }
}
?>