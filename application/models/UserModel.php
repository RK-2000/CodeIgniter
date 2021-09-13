<?php if(! defined('BASEPATH')) exit('No direct script allowed');
class UserModel extends CI_Model{
    public function search_user($email){
        $q = $this->db->query("select email from user where email ='$email'");
        return $q->result_array();
    }
    public function create_user($formValues){
        $this->db->insert('user',$formValues);    
    }
}
?>