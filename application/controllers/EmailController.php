<?php 
class EmailController extends CI_Controller{
    public function index(){
        $this->load->view('SendMail');
    }
    public function sendEmail(){
        
        if(($this->input->post()) > 0)
        {   
            $to = $this->input->post('to');
            $subject = $this->input->post('subject');
            $body = $this->input->post('body');
            $this->load->library('email');

            $config = array();
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.mailtrap.io';
            $config['smtp_user'] = '79c4e2b23773b9';
            $config['smtp_pass'] = 'ee81d857b5e49a';
            $config['smtp_port'] = 2525;
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            
            $this->email->initialize($config);
            
            $this->email->from('phpmailer.1902@gmail.com', 'Ritik Shrivastava');
            $this->email->to($to);
        
            $this->email->subject($subject);
            $this->email->message($body);

            if($this->email->send()){
                dd("success");
            }
            else{
                dd($this->email->print_debugger());
               }
        }
        
    }
}
?>