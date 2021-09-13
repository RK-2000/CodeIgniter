<?php 
class UserControl extends CI_Controller{

    
    public function index(){
        $this->load->view('RegisterUser');
    }
    public function create(){
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
                redirect(base_url());
            }
            else{
                dd("Password didnt match");
            }
        }
        else{
            dd("User present in database");
        }

    }
}
?>