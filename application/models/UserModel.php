<?php if(! defined('BASEPATH')) exit('No direct script allowed');
class UserModel extends CI_Model{
    public function search_user($email){
       
        $q = $this->db->query("select email from users where email ='$email'");
        return $q->result();
    }

    public function check_password($email,$password){
        $res = $this->db->query("select * from users where email = '$email' and password = '$password';");
        return $res->result_array();
    }

    public function create_user($formValues){
        $this->db->insert('users',$formValues);    
    }
}
?>