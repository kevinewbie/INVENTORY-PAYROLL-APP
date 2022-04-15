<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asetkendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_asetkendaraan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/asetkendaraan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/asetkendaraan/index/';
            $config['first_url'] = base_url() . 'index.php/asetkendaraan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_asetkendaraan_model->total_rows($q);
        $asetkendaraan = $this->Tbl_asetkendaraan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'asetkendaraan_data' => $asetkendaraan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','asetkendaraan/tbl_asetkendaraan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_asetkendaraan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_AsetKendaraan' => $row->id_AsetKendaraan,
		'kd_jenis' => $row->kd_jenis,
		'kd_Kendaraan' => $row->kd_Kendaraan,
		'nm_Akantor' => $row->nm_Akantor,
		'merk' => $row->merk,
		'asal' => $row->asal,
		'tahun' => $row->tahun,
		'jumlah' => $row->jumlah,
		'status' => $row->status,
		'kondisi' => $row->kondisi,
		'harga' => $row->harga,
		'nomor_Rangka' => $row->nomor_Rangka,
		'nomor_polisi' => $row->nomor_polisi,
		'nomor_bpkb' => $row->nomor_bpkb,
		'spek_lain' => $row->spek_lain,
		'ket' => $row->ket,
	    );
            $this->template->load('template','asetkendaraan/tbl_asetkendaraan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetkendaraan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('asetkendaraan/create_action'),
	    'id_AsetKendaraan' => set_value('id_AsetKendaraan'),
	    'kd_jenis' => set_value('kd_jenis'),
	    'kd_Kendaraan' => set_value('kd_Kendaraan'),
	    'nm_Akantor' => set_value('nm_Akantor'),
	    'merk' => set_value('merk'),
	    'asal' => set_value('asal'),
	    'tahun' => set_value('tahun'),
	    'jumlah' => set_value('jumlah'),
	    'status' => set_value('status'),
	    'kondisi' => set_value('kondisi'),
	    'harga' => set_value('harga'),
	    'nomor_Rangka' => set_value('nomor_Rangka'),
	    'nomor_polisi' => set_value('nomor_polisi'),
	    'nomor_bpkb' => set_value('nomor_bpkb'),
	    'spek_lain' => set_value('spek_lain'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','asetkendaraan/tbl_asetkendaraan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_Kendaraan' => $this->input->post('kd_Kendaraan',TRUE),
		'nm_Akantor' => $this->input->post('nm_Akantor',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'status' => $this->input->post('status',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'nomor_Rangka' => $this->input->post('nomor_Rangka',TRUE),
		'nomor_polisi' => $this->input->post('nomor_polisi',TRUE),
		'nomor_bpkb' => $this->input->post('nomor_bpkb',TRUE),
		'spek_lain' => $this->input->post('spek_lain',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_asetkendaraan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('asetkendaraan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_asetkendaraan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('asetkendaraan/update_action'),
		'id_AsetKendaraan' => set_value('id_AsetKendaraan', $row->id_AsetKendaraan),
		'kd_jenis' => set_value('kd_jenis', $row->kd_jenis),
		'kd_Kendaraan' => set_value('kd_Kendaraan', $row->kd_Kendaraan),
		'nm_Akantor' => set_value('nm_Akantor', $row->nm_Akantor),
		'merk' => set_value('merk', $row->merk),
		'asal' => set_value('asal', $row->asal),
		'tahun' => set_value('tahun', $row->tahun),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'status' => set_value('status', $row->status),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'harga' => set_value('harga', $row->harga),
		'nomor_Rangka' => set_value('nomor_Rangka', $row->nomor_Rangka),
		'nomor_polisi' => set_value('nomor_polisi', $row->nomor_polisi),
		'nomor_bpkb' => set_value('nomor_bpkb', $row->nomor_bpkb),
		'spek_lain' => set_value('spek_lain', $row->spek_lain),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','asetkendaraan/tbl_asetkendaraan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetkendaraan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_AsetKendaraan', TRUE));
        } else {
            $data = array(
		'kd_jenis' => $this->input->post('kd_jenis',TRUE),
		'kd_Kendaraan' => $this->input->post('kd_Kendaraan',TRUE),
		'nm_Akantor' => $this->input->post('nm_Akantor',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'status' => $this->input->post('status',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'nomor_Rangka' => $this->input->post('nomor_Rangka',TRUE),
		'nomor_polisi' => $this->input->post('nomor_polisi',TRUE),
		'nomor_bpkb' => $this->input->post('nomor_bpkb',TRUE),
		'spek_lain' => $this->input->post('spek_lain',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_asetkendaraan_model->update($this->input->post('id_AsetKendaraan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('asetkendaraan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_asetkendaraan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_asetkendaraan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('asetkendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('asetkendaraan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenis', 'kd jenis', 'trim|required');
	$this->form_validation->set_rules('kd_Kendaraan', 'kd kendaraan', 'trim|required');
	$this->form_validation->set_rules('nm_Akantor', 'nm akantor', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('nomor_Rangka', 'nomor rangka', 'trim|required');
	$this->form_validation->set_rules('nomor_polisi', 'nomor polisi', 'trim|required');
	$this->form_validation->set_rules('nomor_bpkb', 'nomor bpkb', 'trim|required');
	$this->form_validation->set_rules('spek_lain', 'spek lain', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_AsetKendaraan', 'id_AsetKendaraan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_asetkendaraan.xls";
        $judul = "tbl_asetkendaraan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Akantor");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Rangka");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Polisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Bpkb");
	xlsWriteLabel($tablehead, $kolomhead++, "Spek Lain");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tbl_asetkendaraan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_Kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_Akantor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kondisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_Rangka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_polisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_bpkb);
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
        header("Content-Disposition: attachment;Filename=tbl_asetkendaraan.doc");

        $data = array(
            'tbl_asetkendaraan_data' => $this->Tbl_asetkendaraan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('asetkendaraan/tbl_asetkendaraan_doc',$data);
    }

}

