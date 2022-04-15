<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tesitem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tesitem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tesitem/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tesitem/index/';
            $config['first_url'] = base_url() . 'index.php/tesitem/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_tesitem_model->total_rows($q);
        $tesitem = $this->Tbl_tesitem_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tesitem_data' => $tesitem,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tesitem/tbl_tesitem_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_tesitem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_jenis' => $row->kd_jenis,
		'kd_bangunan' => $row->kd_bangunan,
		'maman' => $row->maman,
	    );
            $this->template->load('template','tesitem/tbl_tesitem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tesitem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tesitem/create_action'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'kd_bangunan' => set_value('kd_bangunan'),
	    'maman' => set_value('maman'),
	);
        $this->template->load('template','tesitem/tbl_tesitem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'maman' => $this->input->post('maman',TRUE),
	    );

            $this->Tbl_tesitem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tesitem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tesitem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tesitem/update_action'),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'kd_bangunan' => set_value('kd_bangunan', $row->kd_bangunan),
		'maman' => set_value('maman', $row->maman),
	    );
            $this->template->load('template','tesitem/tbl_tesitem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tesitem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_bangunan', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'maman' => $this->input->post('maman',TRUE),
	    );

            $this->Tbl_tesitem_model->update($this->input->post('kd_bangunan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tesitem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tesitem_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tesitem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tesitem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tesitem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('maman', 'maman', 'trim|required');

	$this->form_validation->set_rules('kd_bangunan', 'kd_bangunan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_tesitem.xls";
        $judul = "tbl_tesitem";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Maman");

	foreach ($this->Tbl_tesitem_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->maman);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_tesitem.doc");

        $data = array(
            'tbl_tesitem_data' => $this->Tbl_tesitem_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tesitem/tbl_tesitem_doc',$data);
    }

}

/* End of file Tesitem.php */
/* Location: ./application/controllers/Tesitem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-11 15:07:54 */
/* http://harviacode.com */