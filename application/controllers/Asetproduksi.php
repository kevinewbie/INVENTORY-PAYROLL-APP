<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asetproduksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_asetproduksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/asetproduksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/asetproduksi/index/';
            $config['first_url'] = base_url() . 'index.php/asetproduksi/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_asetproduksi_model->total_rows($q);
        $asetproduksi = $this->Tbl_asetproduksi_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'asetproduksi_data' => $asetproduksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','asetproduksi/tbl_asetproduksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_asetproduksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_asetproduksi' => $row->id_asetproduksi,
		'kd_jenis' => $row->kd_jenis,
		'kd_Aproduksi' => $row->kd_Aproduksi,
		'nama_AsetProduksi' => $row->nama_AsetProduksi,
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
            $this->template->load('template','asetproduksi/tbl_asetproduksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetproduksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('asetproduksi/create_action'),
	    'id_asetproduksi' => set_value('id_asetproduksi'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'kd_Aproduksi' => set_value('kd_Aproduksi'),
	    'nama_AsetProduksi' => set_value('nama_AsetProduksi'),
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
        $this->template->load('template','asetproduksi/tbl_asetproduksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_Aproduksi' => $this->input->post('kd_Aproduksi',TRUE),
		'nama_AsetProduksi' => $this->input->post('nama_AsetProduksi',TRUE),
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

            $this->Tbl_asetproduksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('asetproduksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_asetproduksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('asetproduksi/update_action'),
		'id_asetproduksi' => set_value('id_asetproduksi', $row->id_asetproduksi),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'kd_Aproduksi' => set_value('kd_Aproduksi', $row->kd_Aproduksi),
		'nama_AsetProduksi' => set_value('nama_AsetProduksi', $row->nama_AsetProduksi),
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
            $this->template->load('template','asetproduksi/tbl_asetproduksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetproduksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_asetproduksi', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_Aproduksi' => $this->input->post('kd_Aproduksi',TRUE),
		'nama_AsetProduksi' => $this->input->post('nama_AsetProduksi',TRUE),
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

            $this->Tbl_asetproduksi_model->update($this->input->post('id_asetproduksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('asetproduksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_asetproduksi_model->get_by_id($id);

        if ($row) {
            $this->Tbl_asetproduksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('asetproduksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetproduksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('kd_Aproduksi', 'kd aproduksi', 'trim|required');
	$this->form_validation->set_rules('nama_AsetProduksi', 'nama asetproduksi', 'trim|required');
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

	$this->form_validation->set_rules('id_asetproduksi', 'id_asetproduksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_asetproduksi.xls";
        $judul = "tbl_asetproduksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Aproduksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama AsetProduksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Spek Lain");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tbl_asetproduksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_Aproduksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_AsetProduksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ukuran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kondisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->spek_lain);
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
        header("Content-Disposition: attachment;Filename=tbl_asetproduksi.doc");

        $data = array(
            'tbl_asetproduksi_data' => $this->Tbl_asetproduksi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('asetproduksi/tbl_asetproduksi_doc',$data);
    }

}

