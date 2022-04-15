<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asetkantor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_asetkantor_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','asetkantor/tbl_asetkantor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_asetkantor_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_asetkantor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_aset' => $row->id_aset,
		'kd_jenis' => $row->kd_jenis,
		'kd_AKantor' => $row->kd_AKantor,
		'nm_Akantor' => $row->nm_Akantor,
		'merk' => $row->merk,
		'asal' => $row->asal,
		'tahun' => $row->tahun,
		'jumlah' => $row->jumlah,
		'satuan' => $row->satuan,
		'ukuran' => $row->ukuran,
		'status' => $row->status,
		'kondisi' => $row->kondisi,
		'harga' => $row->harga,
		'spek_lain' => $row->spek_lain,
		'ket' => $row->ket,
	    );
            $this->template->load('template','asetkantor/tbl_asetkantor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetkantor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('asetkantor/create_action'),
	    'id_aset' => set_value('id_aset'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'kd_AKantor' => set_value('kd_AKantor'),
	    'nm_Akantor' => set_value('nm_Akantor'),
	    'merk' => set_value('merk'),
	    'asal' => set_value('asal'),
	    'tahun' => set_value('tahun'),
	    'jumlah' => set_value('jumlah'),
	    'satuan' => set_value('satuan'),
	    'ukuran' => set_value('ukuran'),
	    'status' => set_value('status'),
	    'kondisi' => set_value('kondisi'),
	    'harga' => set_value('harga'),
	    'spek_lain' => set_value('spek_lain'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','asetkantor/tbl_asetkantor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_AKantor' => $this->input->post('kd_AKantor',TRUE),
		'nm_Akantor' => $this->input->post('nm_Akantor',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'ukuran' => $this->input->post('ukuran',TRUE),
		'status' => $this->input->post('status',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'spek_lain' => $this->input->post('spek_lain',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_asetkantor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('asetkantor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_asetkantor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('asetkantor/update_action'),
		'id_aset' => set_value('id_aset', $row->id_aset),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'kd_AKantor' => set_value('kd_AKantor', $row->kd_AKantor),
		'nm_Akantor' => set_value('nm_Akantor', $row->nm_Akantor),
		'merk' => set_value('merk', $row->merk),
		'asal' => set_value('asal', $row->asal),
		'tahun' => set_value('tahun', $row->tahun),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'satuan' => set_value('satuan', $row->satuan),
		'ukuran' => set_value('ukuran', $row->ukuran),
		'status' => set_value('status', $row->status),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'harga' => set_value('harga', $row->harga),
		'spek_lain' => set_value('spek_lain', $row->spek_lain),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','asetkantor/tbl_asetkantor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetkantor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_aset', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_AKantor' => $this->input->post('kd_AKantor',TRUE),
		'nm_Akantor' => $this->input->post('nm_Akantor',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'ukuran' => $this->input->post('ukuran',TRUE),
		'status' => $this->input->post('status',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'spek_lain' => $this->input->post('spek_lain',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_asetkantor_model->update($this->input->post('id_aset', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('asetkantor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_asetkantor_model->get_by_id($id);

        if ($row) {
            $this->Tbl_asetkantor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('asetkantor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetkantor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('kd_AKantor', 'kd akantor', 'trim|required');
	$this->form_validation->set_rules('nm_Akantor', 'nm akantor', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('ukuran', 'ukuran', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('spek_lain', 'spek lain', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_aset', 'id_aset', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Asetkantor.php */
/* Location: ./application/controllers/Asetkantor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-01 21:09:54 */
/* http://harviacode.com */