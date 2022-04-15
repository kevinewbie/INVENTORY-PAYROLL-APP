<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailbarangmasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_detailbarangmasuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/detailbarangmasuk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/detailbarangmasuk/index/';
            $config['first_url'] = base_url() . 'index.php/detailbarangmasuk/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_detailbarangmasuk_model->total_rows($q);
        $detailbarangmasuk = $this->Tbl_detailbarangmasuk_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailbarangmasuk_data' => $detailbarangmasuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','detailbarangmasuk/tbl_detailbarangmasuk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_detailbarangmasuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'id_barangmasuk' => $row->id_barangmasuk,
		'id_barang' => $row->id_barang,
		'jlh_masuk' => $row->jlh_masuk,
		'kd_posisi' => $row->kd_posisi,
		'no_kontrak' => $row->no_kontrak,
	    );
            $this->template->load('template','detailbarangmasuk/tbl_detailbarangmasuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailbarangmasuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailbarangmasuk/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'id_barangmasuk' => set_value('id_barangmasuk'),
	    'id_barang' => set_value('id_barang'),
	    'jlh_masuk' => set_value('jlh_masuk'),
	    'kd_posisi' => set_value('kd_posisi'),
	    'no_kontrak' => set_value('no_kontrak'),
	);
        $this->template->load('template','detailbarangmasuk/tbl_detailbarangmasuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barangmasuk' => $this->input->post('id_barangmasuk',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jlh_masuk' => $this->input->post('jlh_masuk',TRUE),
		'kd_posisi' => $this->input->post('kd_posisi',TRUE),
		'no_kontrak' => $this->input->post('no_kontrak',TRUE),
	    );

            $this->Tbl_detailbarangmasuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('detailbarangmasuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_detailbarangmasuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailbarangmasuk/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'id_barangmasuk' => set_value('id_barangmasuk', $row->id_barangmasuk),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'jlh_masuk' => set_value('jlh_masuk', $row->jlh_masuk),
		'kd_posisi' => set_value('kd_posisi', $row->kd_posisi),
		'no_kontrak' => set_value('no_kontrak', $row->no_kontrak),
	    );
            $this->template->load('template','detailbarangmasuk/tbl_detailbarangmasuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailbarangmasuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nmr', TRUE));
        } else {
            $data = array(
		'id_barangmasuk' => $this->input->post('id_barangmasuk',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jlh_masuk' => $this->input->post('jlh_masuk',TRUE),
		'kd_posisi' => $this->input->post('kd_posisi',TRUE),
		'no_kontrak' => $this->input->post('no_kontrak',TRUE),
	    );

            $this->Tbl_detailbarangmasuk_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailbarangmasuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_detailbarangmasuk_model->get_by_id($id);

        if ($row) {
            $this->Tbl_detailbarangmasuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailbarangmasuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailbarangmasuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barangmasuk', 'id barangmasuk', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('jlh_masuk', 'jlh masuk', 'trim|required');
	$this->form_validation->set_rules('kd_posisi', 'kd posisi', 'trim|required');
	$this->form_validation->set_rules('no_kontrak', 'no kontrak', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_detailbarangmasuk.xls";
        $judul = "tbl_detailbarangmasuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barangmasuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jlh Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Posisi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kontrak");

	foreach ($this->Tbl_detailbarangmasuk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barangmasuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jlh_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_posisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kontrak);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_detailbarangmasuk.doc");

        $data = array(
            'tbl_detailbarangmasuk_data' => $this->Tbl_detailbarangmasuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detailbarangmasuk/tbl_detailbarangmasuk_doc',$data);
    }

}

/* End of file Detailbarangmasuk.php */
/* Location: ./application/controllers/Detailbarangmasuk.php */