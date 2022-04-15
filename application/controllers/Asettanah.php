<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asettanah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_asettanah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/asettanah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/asettanah/index/';
            $config['first_url'] = base_url() . 'index.php/asettanah/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_asettanah_model->total_rows($q);
        $asettanah = $this->Tbl_asettanah_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'asettanah_data' => $asettanah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','asettanah/tbl_asettanah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_asettanah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_asettanah' => $row->id_asettanah,
		'kd_jenis' => $row->kd_jenis,
		'kd_tanah' => $row->kd_tanah,
		'nama_tanah' => $row->nama_tanah,
		'lokasi' => $row->lokasi,
		'asal' => $row->asal,
		'nomor_sertifikat' => $row->nomor_sertifikat,
		'luas' => $row->luas,
		'tahun' => $row->tahun,
		'kondisi' => $row->kondisi,
		'harga' => $row->harga,
		'status' => $row->status,
		'ket' => $row->ket,
	    );
            $this->template->load('template','asettanah/tbl_asettanah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asettanah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('asettanah/create_action'),
	    'id_asettanah' => set_value('id_asettanah'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'kd_tanah' => set_value('kd_tanah'),
	    'nama_tanah' => set_value('nama_tanah'),
	    'lokasi' => set_value('lokasi'),
	    'asal' => set_value('asal'),
	    'nomor_sertifikat' => set_value('nomor_sertifikat'),
	    'luas' => set_value('luas'),
	    'tahun' => set_value('tahun'),
	    'kondisi' => set_value('kondisi'),
	    'harga' => set_value('harga'),
	    'status' => set_value('status'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','asettanah/tbl_asettanah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_tanah' => $this->input->post('kd_tanah',TRUE),
		'nama_tanah' => $this->input->post('nama_tanah',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'nomor_sertifikat' => $this->input->post('nomor_sertifikat',TRUE),
		'luas' => $this->input->post('luas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_asettanah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('asettanah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_asettanah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('asettanah/update_action'),
		'id_asettanah' => set_value('id_asettanah', $row->id_asettanah),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'kd_tanah' => set_value('kd_tanah', $row->kd_tanah),
		'nama_tanah' => set_value('nama_tanah', $row->nama_tanah),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'asal' => set_value('asal', $row->asal),
		'nomor_sertifikat' => set_value('nomor_sertifikat', $row->nomor_sertifikat),
		'luas' => set_value('luas', $row->luas),
		'tahun' => set_value('tahun', $row->tahun),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'harga' => set_value('harga', $row->harga),
		'status' => set_value('status', $row->status),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','asettanah/tbl_asettanah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asettanah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_asettanah', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_tanah' => $this->input->post('kd_tanah',TRUE),
		'nama_tanah' => $this->input->post('nama_tanah',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'nomor_sertifikat' => $this->input->post('nomor_sertifikat',TRUE),
		'luas' => $this->input->post('luas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_asettanah_model->update($this->input->post('id_asettanah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('asettanah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_asettanah_model->get_by_id($id);

        if ($row) {
            $this->Tbl_asettanah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('asettanah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asettanah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('kd_tanah', 'kd tanah', 'trim|required');
	$this->form_validation->set_rules('nama_tanah', 'nama tanah', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('nomor_sertifikat', 'nomor sertifikat', 'trim|required');
	$this->form_validation->set_rules('luas', 'luas', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_asettanah', 'id_asettanah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_asettanah.xls";
        $judul = "tbl_asettanah";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Tanah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Tanah");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Sertifikat");
	xlsWriteLabel($tablehead, $kolomhead++, "Luas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tbl_asettanah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_tanah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_tanah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_sertifikat);
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
        header("Content-Disposition: attachment;Filename=tbl_asettanah.doc");

        $data = array(
            'tbl_asettanah_data' => $this->Tbl_asettanah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('asettanah/tbl_asettanah_doc',$data);
    }

}

