<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jaset extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_jaset_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/jaset/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/jaset/index/';
            $config['first_url'] = base_url() . 'index.php/jaset/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_jaset_model->total_rows($q);
        $jaset = $this->Tbl_jaset_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jaset_data' => $jaset,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','jaset/tbl_jaset_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_jaset_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jaset' => $row->id_jaset,
		'kd_jenis' => $row->kd_jenis,
		'nama_jenis' => $row->nama_jenis,
	    );
            $this->template->load('template','jaset/tbl_jaset_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jaset'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jaset/create_action'),
	    'id_jaset' => set_value('id_jaset'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'nama_jenis' => set_value('nama_jenis'),
	);
        $this->template->load('template','jaset/tbl_jaset_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'nama_jenis' => $this->input->post('nama_jenis',TRUE),
	    );

            $this->Tbl_jaset_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('jaset'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_jaset_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jaset/update_action'),
		'id_jaset' => set_value('id_jaset', $row->id_jaset),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'nama_jenis' => set_value('nama_jenis', $row->nama_jenis),
	    );
            $this->template->load('template','jaset/tbl_jaset_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jaset'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jaset', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'nama_jenis' => $this->input->post('nama_jenis',TRUE),
	    );

            $this->Tbl_jaset_model->update($this->input->post('id_jaset', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jaset'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_jaset_model->get_by_id($id);

        if ($row) {
            $this->Tbl_jaset_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jaset'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jaset'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('nama_jenis', 'nama jenis', 'trim|required');

	$this->form_validation->set_rules('id_jaset', 'id_jaset', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_jaset.xls";
        $judul = "tbl_jaset";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Jenis");

	foreach ($this->Tbl_jaset_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jenis);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_jaset.doc");

        $data = array(
            'tbl_jaset_data' => $this->Tbl_jaset_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jaset/tbl_jaset_doc',$data);
    }

}

