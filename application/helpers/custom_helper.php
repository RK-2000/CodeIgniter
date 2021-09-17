<?php 
    function dd($data){
        print "<pre>";
        print_r($data);
        print "</pre>";
        exit;
    }
    
    function is_authenticated(){
        $ci = & get_instance();  
        if($ci->session->userdata('email')){
            return true;
        }
        else{
            return false;
        }
    }

    function message($tag,$message){
        $ci = & get_instance();
        $ci->session->set_flashdata($tag,$message);
    }
    
?>