<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Abangunan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_abangunan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/abangunan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/abangunan/index/';
            $config['first_url'] = base_url() . 'index.php/abangunan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_abangunan_model->total_rows($q);
        $abangunan = $this->Tbl_abangunan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'abangunan_data' => $abangunan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','abangunan/tbl_abangunan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_abangunan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_asetbangunan' => $row->id_asetbangunan,
		'kd_jenis' => $row->kd_jenis,
		'kode_bangunan' => $row->kode_bangunan,
		'nama_bangunan' => $row->nama_bangunan,
		'lokasi' => $row->lokasi,
		'asal' => $row->asal,
		'no_sertifikat' => $row->no_sertifikat,
		'luas' => $row->luas,
		'tahun' => $row->tahun,
		'kondisi' => $row->kondisi,
		'harga' => $row->harga,
		'status' => $row->status,
		'ket' => $row->ket,
	    );
            $this->template->load('template','abangunan/tbl_abangunan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('abangunan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('abangunan/create_action'),
	    'id_asetbangunan' => set_value('id_asetbangunan'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'kode_bangunan' => set_value('kode_bangunan'),
	    'nama_bangunan' => set_value('nama_bangunan'),
	    'lokasi' => set_value('lokasi'),
	    'asal' => set_value('asal'),
	    'no_sertifikat' => set_value('no_sertifikat'),
	    'luas' => set_value('luas'),
	    'tahun' => set_value('tahun'),
	    'kondisi' => set_value('kondisi'),
	    'harga' => set_value('harga'),
	    'status' => set_value('status'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','abangunan/tbl_abangunan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kode_bangunan' => $this->input->post('kode_bangunan',TRUE),
		'nama_bangunan' => $this->input->post('nama_bangunan',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'no_sertifikat' => $this->input->post('no_sertifikat',TRUE),
		'luas' => $this->input->post('luas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_abangunan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('abangunan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_abangunan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('abangunan/update_action'),
		'id_asetbangunan' => set_value('id_asetbangunan', $row->id_asetbangunan),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'kode_bangunan' => set_value('kode_bangunan', $row->kode_bangunan),
		'nama_bangunan' => set_value('nama_bangunan', $row->nama_bangunan),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'asal' => set_value('asal', $row->asal),
		'no_sertifikat' => set_value('no_sertifikat', $row->no_sertifikat),
		'luas' => set_value('luas', $row->luas),
		'tahun' => set_value('tahun', $row->tahun),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'harga' => set_value('harga', $row->harga),
		'status' => set_value('status', $row->status),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','abangunan/tbl_abangunan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('abangunan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_asetbangunan', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kode_bangunan' => $this->input->post('kode_bangunan',TRUE),
		'nama_bangunan' => $this->input->post('nama_bangunan',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'no_sertifikat' => $this->input->post('no_sertifikat',TRUE),
		'luas' => $this->input->post('luas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_abangunan_model->update($this->input->post('id_asetbangunan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('abangunan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_abangunan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_abangunan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('abangunan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('abangunan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('kode_bangunan', 'kode bangunan', 'trim|required');
	$this->form_validation->set_rules('nama_bangunan', 'nama bangunan', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('no_sertifikat', 'no sertifikat', 'trim|required');
	$this->form_validation->set_rules('luas', 'luas', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_asetbangunan', 'id_asetbangunan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_abangunan.xls";
        $judul = "tbl_abangunan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Bangunan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Bangunan");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "No Sertifikat");
	xlsWriteLabel($tablehead, $kolomhead++, "Luas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tbl_abangunan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_bangunan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_bangunan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_sertifikat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->luas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kondisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_abangunan.doc");

        $data = array(
            'tbl_abangunan_data' => $this->Tbl_abangunan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('abangunan/tbl_abangunan_doc',$data);
    }

}

