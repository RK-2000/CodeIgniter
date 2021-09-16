<?php if(! defined('BASEPATH')) exit('No direct script allowed');
class UserModel extends CI_Model{
    
    public function search_user($email){
        $q = $this->db->query("select * from users where email ='$email'");
        if($q){
            return true;
        }
        else{
            return false;
        }
    }

    public function check_password($email,$password){
        $res = $this->db->query("select * from users where email = '$email';");
        $res=$res->result_array();
        if(password_verify($password,$res[0]['password'])){
            return $res[0];
        }
    }

    public function create_user($formValues){
        $check = $this->db->insert('users',$formValues);
        if($check){
            return true;
        }else{
            return false;
        }    
    }

    public function fetch_userid($email)
    {
        $id = $this->db->query("select id from users where email = '$email';");
        return $id->result_array()[0]['id'] ;
    }
}
?>