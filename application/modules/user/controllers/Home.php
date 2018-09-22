<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title']="Home Title";
		$this->template->load('admin','home',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/user/controllers/Home.php */