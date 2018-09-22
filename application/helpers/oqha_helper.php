<?php


function rename_string_is_aktif($string){
        return $string=='y'?'Aktif':'Tidak Aktif';
    }
    

function is_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('id_users')){
        redirect('admin/auth');
    }
    else if($ci->session->userdata('id_users') && !$ci->uri->segment(2)){
        redirect('admin/home');
    }
    else{
        $modul = "admin/".$ci->uri->segment(2);
        $id_user_level = $ci->session->userdata('id_user_level');
        $menu = $ci->db->get_where('tbl_menu',array('url'=>$modul))->row_array();
        $id_menu = $menu['id_menu'];
        $hak_akses = $ci->db->get_where('tbl_hak_akses',array('id_menu'=>$id_menu,'id_user_level'=>$id_user_level));
        if($hak_akses->num_rows()<1){
            redirect('404');
            exit;
        }
    }
}

function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level,$id_menu){
    $ci = get_instance();
    $ci->db->where('id_user_level',$id_user_level);
    $ci->db->where('id_menu',$id_menu);
    $data = $ci->db->get('tbl_hak_akses');
    if($data->num_rows()>0){
        return "checked='checked'";
    }
}




function cmb_dinamis($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
