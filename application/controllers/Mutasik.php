<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_mutasik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/mutasik/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/mutasik/index/';
            $config['first_url'] = base_url() . 'index.php/mutasik/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_mutasik_model->total_rows($q);
        $mutasik = $this->Tbl_mutasik_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasik_data' => $mutasik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','mutasik/tbl_mutasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_mutasik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mutasi' => $row->id_mutasi,
		'kd_mutasi' => $row->kd_mutasi,
		'nama_alpro' => $row->nama_alpro,
		'nama_bmutasi' => $row->nama_bmutasi,
		'jumlah' => $row->jumlah,
		'posisi_aset' => $row->posisi_aset,
		'kondisi' => $row->kondisi,
		'penanggungjawab' => $row->penanggungjawab,
		'nokontrak' => $row->nokontrak,
		'ket' => $row->ket,
	    );
            $this->template->load('template','mutasik/tbl_mutasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mutasik/create_action'),
	    'id_mutasi' => set_value('id_mutasi'),
	    'kd_mutasi' => set_value('kd_mutasi'),
	    'nama_alpro' => set_value('nama_alpro'),
	    'nama_bmutasi' => set_value('nama_bmutasi'),
	    'jumlah' => set_value('jumlah'),
	    'posisi_aset' => set_value('posisi_aset'),
	    'kondisi' => set_value('kondisi'),
	    'penanggungjawab' => set_value('penanggungjawab'),
	    'nokontrak' => set_value('nokontrak'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','mutasik/tbl_mutasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_mutasi' => $this->input->post('kd_mutasi',TRUE),
		'nama_alpro' => $this->input->post('nama_alpro',TRUE),
		'nama_bmutasi' => $this->input->post('nama_bmutasi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'posisi_aset' => $this->input->post('posisi_aset',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'penanggungjawab' => $this->input->post('penanggungjawab',TRUE),
		'nokontrak' => $this->input->post('nokontrak',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_mutasik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mutasik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_mutasik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasik/update_action'),
		'id_mutasi' => set_value('id_mutasi', $row->id_mutasi),
		'kd_mutasi' => set_value('kd_mutasi', $row->kd_mutasi),
		'nama_alpro' => set_value('nama_alpro', $row->nama_alpro),
		'nama_bmutasi' => set_value('nama_bmutasi', $row->nama_bmutasi),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'posisi_aset' => set_value('posisi_aset', $row->posisi_aset),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'penanggungjawab' => set_value('penanggungjawab', $row->penanggungjawab),
		'nokontrak' => set_value('nokontrak', $row->nokontrak),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','mutasik/tbl_mutasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mutasi', TRUE));
        } else {
            $data = array(
		'kd_mutasi' => $this->input->post('kd_mutasi',TRUE),
		'nama_alpro' => $this->input->post('nama_alpro',TRUE),
		'nama_bmutasi' => $this->input->post('nama_bmutasi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'posisi_aset' => $this->input->post('posisi_aset',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'penanggungjawab' => $this->input->post('penanggungjawab',TRUE),
		'nokontrak' => $this->input->post('nokontrak',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_mutasik_model->update($this->input->post('id_mutasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_mutasik_model->get_by_id($id);

        if ($row) {
            $this->Tbl_mutasik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_mutasi', 'kd mutasi', 'trim|required');
	$this->form_validation->set_rules('nama_alpro', 'nama alpro', 'trim|required');
	$this->form_validation->set_rules('nama_bmutasi', 'nama bmutasi', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('posisi_aset', 'posisi aset', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'trim|required');
	$this->form_validation->set_rules('nokontrak', 'nokontrak', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_mutasi', 'id_mutasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

