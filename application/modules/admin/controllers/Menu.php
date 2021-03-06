<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
$this->form_validation->CI =& $this;        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['setting'] = $this->db->get_where('tbl_setting',array('id_setting'=>1))->row_array();
        $this->template->load('admin','menu/tbl_menu_list','Menu',$data);
    }
    
    function simpan_setting(){
        $value = $this->input->post('tampil_menu');
        $this->db->where('id_setting',1);
        $this->db->update('tbl_setting',array('value'=>$value));
        redirect(site_url($this->config->item("dashboardUrl").'menu'));
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Menu_model->json();
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url($this->config->item("dashboardUrl").'menu/create_action'),
	    'id_menu' => set_value('id_menu'),
	    'title' => set_value('title'),
	    'url' => set_value('url'),
	    'icon' => set_value('icon'),
        'is_main_menu' => set_value('is_main_menu'),
	    'urutan' => set_value('urutan'),
	    'is_aktif' => set_value('is_aktif'),
	);
        $this->template->load('admin','menu/tbl_menu_form','Create Menu', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'url' => $this->input->post('url',TRUE),
		'icon' => $this->input->post('icon',TRUE),
        'is_main_menu' => $this->input->post('is_main_menu',TRUE),
		'urutan' => $this->input->post('urutan',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Success');
            redirect(site_url($this->config->item("dashboardUrl").'menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url($this->config->item("dashboardUrl").'menu/update_action'),
		'id_menu' => set_value('id_menu', $row->id_menu),
		'title' => set_value('title', $row->title),
		'url' => set_value('url', $row->url),
		'icon' => set_value('icon', $row->icon),
        'is_main_menu' => set_value('is_main_menu', $row->is_main_menu),
		'urutan' => set_value('urutan', $row->urutan),
		'is_aktif' => set_value('is_aktif', $row->is_aktif),
	    );
            $this->template->load('admin','menu/tbl_menu_form',"Update Menu", $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url($this->config->item("dashboardUrl").'menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_menu', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'url' => $this->input->post('url',TRUE),
		'icon' => $this->input->post('icon',TRUE),
        'is_main_menu' => $this->input->post('is_main_menu',TRUE),
		'urutan' => $this->input->post('urutan',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Success');
            redirect(site_url($this->config->item("dashboardUrl").'menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Success');
            redirect(site_url($this->config->item("dashboardUrl").'menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url($this->config->item("dashboardUrl").'menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
    $this->form_validation->set_rules('is_main_menu', 'is main menu', 'trim|required');
	$this->form_validation->set_rules('urutan', 'urutan', 'trim|required|numeric');
	$this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

	$this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_menu.xls";
        $judul = "tbl_menu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Title");
	xlsWriteLabel($tablehead, $kolomhead++, "Url");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
    xlsWriteLabel($tablehead, $kolomhead++, "Is Main Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Urutan");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");

	foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->title);
	    xlsWriteLabel($tablebody, $kolombody++, $data->url);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
        xlsWriteNumber($tablebody, $kolombody++, $data->is_main_menu);
	    xlsWriteNumber($tablebody, $kolombody++, $data->urutan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_menu.doc");

        $data = array(
            'tbl_menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('menu/tbl_menu_doc',$data);
    }

}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */