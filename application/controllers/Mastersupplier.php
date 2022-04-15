<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mastersupplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_mastersupplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/mastersupplier/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/mastersupplier/index/';
            $config['first_url'] = base_url() . 'index.php/mastersupplier/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_mastersupplier_model->total_rows($q);
        $mastersupplier = $this->Tbl_mastersupplier_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mastersupplier_data' => $mastersupplier,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','mastersupplier/tbl_mastersupplier_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_mastersupplier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'id_sup' => $row->id_sup,
		'alamat_sup' => $row->alamat_sup,
		'telp_sup' => $row->telp_sup,
		'nm_kontrak' => $row->nm_kontrak,
		'produk' => $row->produk,
	    );
            $this->template->load('template','mastersupplier/tbl_mastersupplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mastersupplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mastersupplier/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'id_sup' => set_value('id_sup'),
	    'alamat_sup' => set_value('alamat_sup'),
	    'telp_sup' => set_value('telp_sup'),
	    'nm_kontrak' => set_value('nm_kontrak'),
	    'produk' => set_value('produk'),
	);
        $this->template->load('template','mastersupplier/tbl_mastersupplier_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_sup' => $this->input->post('id_sup',TRUE),
		'alamat_sup' => $this->input->post('alamat_sup',TRUE),
		'telp_sup' => $this->input->post('telp_sup',TRUE),
		'nm_kontrak' => $this->input->post('nm_kontrak',TRUE),
		'produk' => $this->input->post('produk',TRUE),
	    );

            $this->Tbl_mastersupplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mastersupplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_mastersupplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mastersupplier/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'id_sup' => set_value('id_sup', $row->id_sup),
		'alamat_sup' => set_value('alamat_sup', $row->alamat_sup),
		'telp_sup' => set_value('telp_sup', $row->telp_sup),
		'nm_kontrak' => set_value('nm_kontrak', $row->nm_kontrak),
		'produk' => set_value('produk', $row->produk),
	    );
            $this->template->load('template','mastersupplier/tbl_mastersupplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mastersupplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nmr', TRUE));
        } else {
            $data = array(
		'id_sup' => $this->input->post('id_sup',TRUE),
		'alamat_sup' => $this->input->post('alamat_sup',TRUE),
		'telp_sup' => $this->input->post('telp_sup',TRUE),
		'nm_kontrak' => $this->input->post('nm_kontrak',TRUE),
		'produk' => $this->input->post('produk',TRUE),
	    );

            $this->Tbl_mastersupplier_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mastersupplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_mastersupplier_model->get_by_id($id);

        if ($row) {
            $this->Tbl_mastersupplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mastersupplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mastersupplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_sup', 'id sup', 'trim|required');
	$this->form_validation->set_rules('alamat_sup', 'alamat sup', 'trim|required');
	$this->form_validation->set_rules('telp_sup', 'telp sup', 'trim|required');
	$this->form_validation->set_rules('nm_kontrak', 'nm kontrak', 'trim|required');
	$this->form_validation->set_rules('produk', 'produk', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_mastersupplier.xls";
        $judul = "tbl_mastersupplier";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Sup");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Sup");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Sup");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Kontrak");
	xlsWriteLabel($tablehead, $kolomhead++, "Produk");

	foreach ($this->Tbl_mastersupplier_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_sup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_sup);
	    xlsWriteNumber($tablebody, $kolombody++, $data->telp_sup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_kontrak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->produk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_mastersupplier.doc");

        $data = array(
            'tbl_mastersupplier_data' => $this->Tbl_mastersupplier_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mastersupplier/tbl_mastersupplier_doc',$data);
    }

}

/* End of file Mastersupplier.php */
/* Location: ./application/controllers/Mastersupplier.php */