<?php 
if($request->ajax()){
    $start = $request->start;
    $legnth = $request->length;
    $coulmn = $request->order[0]['column'];
    $ascc = $request->order[0]['dir'];
    $search = $request->search['value'];
    $clubs = Club::with('user');
    if(!empty($search)){
        $where = "( name LIKE '%".$search."%' )";
        $clubs->whereRaw($where);
    }
    if ($coulmn == 1) {
       $clubs->orderBy('id',$ascc);
    } elseif($coulmn == 2) {
       $clubs->orderBy('name',$ascc);
    } elseif($coulmn == 3) {
       $clubs->orderBy('email',$ascc);
    } elseif($coulmn == 4) {
        $clubs->orderBy('mobile_number',$ascc);
    } elseif($coulmn == 5) {
        $clubs->orderBy('time',$ascc);
    }

    $clubsCount = $clubs->count();
    $list = $clubs->offset($start)->limit($legnth)->get();
    if(count($list) > 0){
        // assigned.edit
        foreach ($list as $key => $value) {
            $html = '
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                    <li><a href="'.route('clubs.view',$value->id).'" >View</a></li>
                    <li><a href="'.route('clubs.edit',$value->id).'" >Edit</a></li>
                    <li><a href="javascript:void(0)" data-delete-link="'.route('clubs.delete',$value->id).'" class="user-delete-link">Delete</a></li>
                    </ul>
                </div>
            ';
           
            $nestedData[0] = $start+$key+1;                    
            if(!empty($value->user)){
                $nestedData[1] = $value->user->name;
            }else{
                if(!empty($value->user_id)){
                    $nestedData[1] = "--";
                }else{
                    $nestedData[1] = "Admin";
                }
                
            }
            $nestedData[2] =$value->name;                   
            $nestedData[3] =  $value->created_at->format('d/m/Y');
            $nestedData[4] = $html;
            $data[] = $nestedData;
        }

        $json_data = array(
            "recordsTotal"    => $clubsCount,
            "recordsFiltered" => $clubsCount,
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
?>