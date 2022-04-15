<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asetgerak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_asetgerak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/asetgerak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/asetgerak/index/';
            $config['first_url'] = base_url() . 'index.php/asetgerak/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_asetgerak_model->total_rows($q);
        $asetgerak = $this->Tbl_asetgerak_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'asetgerak_data' => $asetgerak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','asetgerak/tbl_asetgerak_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_asetgerak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_aset' => $row->id_aset,
		'kode_aset' => $row->kode_aset,
		'nama_aset' => $row->nama_aset,
	    );
            $this->template->load('template','asetgerak/tbl_asetgerak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetgerak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('asetgerak/create_action'),
	    'id_aset' => set_value('id_aset'),
	    'kode_aset' => set_value('kode_aset'),
	    'nama_aset' => set_value('nama_aset'),
	);
        $this->template->load('template','asetgerak/tbl_asetgerak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_aset' => $this->input->post('kode_aset',TRUE),
		'nama_aset' => $this->input->post('nama_aset',TRUE),
	    );

            $this->Tbl_asetgerak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('asetgerak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_asetgerak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('asetgerak/update_action'),
		'id_aset' => set_value('id_aset', $row->id_aset),
		'kode_aset' => set_value('kode_aset', $row->kode_aset),
		'nama_aset' => set_value('nama_aset', $row->nama_aset),
	    );
            $this->template->load('template','asetgerak/tbl_asetgerak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetgerak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_aset', TRUE));
        } else {
            $data = array(
		'kode_aset' => $this->input->post('kode_aset',TRUE),
		'nama_aset' => $this->input->post('nama_aset',TRUE),
	    );

            $this->Tbl_asetgerak_model->update($this->input->post('id_aset', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('asetgerak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_asetgerak_model->get_by_id($id);

        if ($row) {
            $this->Tbl_asetgerak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('asetgerak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetgerak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_aset', 'kode aset', 'trim|required');
	$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');

	$this->form_validation->set_rules('id_aset', 'id_aset', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_asetgerak.xls";
        $judul = "tbl_asetgerak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Aset");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Aset");

	foreach ($this->Tbl_asetgerak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_aset);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_aset);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_asetgerak.doc");

        $data = array(
            'tbl_asetgerak_data' => $this->Tbl_asetgerak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('asetgerak/tbl_asetgerak_doc',$data);
    }

}

