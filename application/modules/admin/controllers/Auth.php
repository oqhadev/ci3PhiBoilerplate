<?php
Class Auth extends CI_Controller{



  function index(){
    $this->load->view('auth/login');
  }

  function cheklogin(){
    $email      = $this->input->post('email');
    $password = $this->input->post('password',TRUE);
    $hashPass = password_hash($password,PASSWORD_DEFAULT);
    $test     = password_verify($password, $hashPass);
    $this->db->where('email',$email);
    $users       = $this->db->get('tbl_user');
    if($users->num_rows()>0){
      $user = $users->row_array();
      if(password_verify($password,$user['password'])){
        $this->session->set_userdata($user);

        if( $this->input->post('rememberme'))  {
         $this->load->helper('cookie');
         $cookie = $this->input->cookie('ci_session'); 
         $this->input->set_cookie('ci_session', $cookie, '35580000'); 
       }

       $this->session->set_flashdata('notif','<div class="alert alert-success">
        <strong>Login Berhasil!   </strong>selamat datang <b>'.$user['full_name'].' </b>
        </div>');
       redirect($this->config->item("dashboardUrl").'home');

     }else{
      $this->session->set_flashdata('status_login','<div class="alert alert-warning">
        <strong>Gagal! </strong>email atau password yang anda input salah.
        </div>');
      redirect($this->config->item("dashboardUrl").'auth');
    }
  }else{
    $this->session->set_flashdata('status_login','<div class="alert alert-warning">
      <strong>Gagal! </strong>email atau password yang anda input salah.
      </div>');
    redirect($this->config->item("dashboardUrl").'auth');
  }
}

function logout(){
  $this->session->sess_destroy();
    // $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
  redirect('/');
}

public function notFound()
{
  $this->load->view('auth/NotFound');
  
}


}
