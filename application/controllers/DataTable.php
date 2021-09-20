<?php 
class DataTable extends CI_Controller {
    public function index(){

        if($this->input->is_ajax_request()){
            $start = $this->input->get('start');
            $legnth = $this->input->get('length');
            $coulmn = $this->input->get('order')[0]['column'];
            $ascc = $this->input->get('order')[0]['dir'];;
            $search =  $this->input->get('search')['value'];
            $users = $this->db->select('users.*');
            if(!empty($search)){
                $where = "( name LIKE '%".$search."%' or email  LIKE '%".$search."%')";
                $users->where($where);
            }
            if ($coulmn == 1) {
               $users->order_by('id',$ascc);
            } elseif($coulmn == 2) {
               $users->orderBy('name',$ascc);
            } elseif($coulmn == 3) {
               $users->orderBy('email',$ascc);
            } 
            
            // $clubsCount = $clubs->count();
            $list = $users->limit($legnth, $start)->get('users')->result();
           
            if(count($list) > 0){
                // assigned.edit
                foreach ($list as $key => $value) {
                    
                   
                    $nestedData[0] = $start+$key+1;                    
                    $nestedData[1] = $value->name;
                    $nestedData[2] =$value->email;                 
                    
                    $data[] = $nestedData;
                }
        
                $json_data = array(
                    "recordsTotal"    => 12,
                    "recordsFiltered" => 12,
                    "data"            => $data
                );
        
        
            }else{
                $json_data = array(
                    "recordsTotal"    => 0,
                    "recordsFiltered" => 0,
                    "data"            => []
                );
            }
            echo json_encode($json_data);
            exit;
        }
        // if($this->input->is_ajax_request()){
        //     $users = $this->UserModel->get_all_user();
        //     $data = array();
        //     foreach($users as $user){
        //         $json_data = array(
        //             "data"  => $user
        //         );
        //         echo json_encode($json_data);    
        //     }    
        // }
        $this->load->view("Datatable");
    }
}
?>