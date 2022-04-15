<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_pembelian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/pembelian/index/';
            $config['first_url'] = base_url() . 'index.php/pembelian/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_pembelian_model->total_rows($q);
        $pembelian = $this->Tbl_pembelian_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_data' => $pembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pembelian/tbl_pembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'no_po' => $row->no_po,
		'tgl_po' => $row->tgl_po,
		'no_pembelian' => $row->no_pembelian,
		'id_sup' => $row->id_sup,
		'carabayar' => $row->carabayar,
		'ongkir' => $row->ongkir,
		'barang' => $row->barang,
		'jlh_ok' => $row->jlh_ok,
		'harga_satuan' => $row->harga_satuan,
	    );
            $this->template->load('template','pembelian/tbl_pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'no_po' => set_value('no_po'),
	    'tgl_po' => set_value('tgl_po'),
	    'no_pembelian' => set_value('no_pembelian'),
	    'id_sup' => set_value('id_sup'),
	    'carabayar' => set_value('carabayar'),
	    'ongkir' => set_value('ongkir'),
	    'barang' => set_value('barang'),
	    'jlh_ok' => set_value('jlh_ok'),
	    'harga_satuan' => set_value('harga_satuan'),
	);
        $this->template->load('template','pembelian/tbl_pembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_po' => $this->input->post('no_po',TRUE),
		'tgl_po' => $this->input->post('tgl_po',TRUE),
		'no_pembelian' => $this->input->post('no_pembelian',TRUE),
		'id_sup' => $this->input->post('id_sup',TRUE),
		'carabayar' => $this->input->post('carabayar',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
		'barang' => $this->input->post('barang',TRUE),
		'jlh_ok' => $this->input->post('jlh_ok',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
	    );

            $this->Tbl_pembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'no_po' => set_value('no_po', $row->no_po),
		'tgl_po' => set_value('tgl_po', $row->tgl_po),
		'no_pembelian' => set_value('no_pembelian', $row->no_pembelian),
		'id_sup' => set_value('id_sup', $row->id_sup),
		'carabayar' => set_value('carabayar', $row->carabayar),
		'ongkir' => set_value('ongkir', $row->ongkir),
		'barang' => set_value('barang', $row->barang),
		'jlh_ok' => set_value('jlh_ok', $row->jlh_ok),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
	    );
            $this->template->load('template','pembelian/tbl_pembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nmr', TRUE));
        } else {
            $data = array(
		'no_po' => $this->input->post('no_po',TRUE),
		'tgl_po' => $this->input->post('tgl_po',TRUE),
		'no_pembelian' => $this->input->post('no_pembelian',TRUE),
		'id_sup' => $this->input->post('id_sup',TRUE),
		'carabayar' => $this->input->post('carabayar',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
		'barang' => $this->input->post('barang',TRUE),
		'jlh_ok' => $this->input->post('jlh_ok',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
	    );

            $this->Tbl_pembelian_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pembelian_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_po', 'no po', 'trim|required');
	$this->form_validation->set_rules('tgl_po', 'tgl po', 'trim|required');
	$this->form_validation->set_rules('no_pembelian', 'no pembelian', 'trim|required');
	$this->form_validation->set_rules('id_sup', 'id sup', 'trim|required');
	$this->form_validation->set_rules('carabayar', 'carabayar', 'trim|required');
	$this->form_validation->set_rules('ongkir', 'ongkir', 'trim|required');
	$this->form_validation->set_rules('barang', 'barang', 'trim|required');
	$this->form_validation->set_rules('jlh_ok', 'jlh ok', 'trim|required');
	$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pembelian.xls";
        $judul = "tbl_pembelian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Po");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Po");
	xlsWriteLabel($tablehead, $kolomhead++, "No Pembelian");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Sup");
	xlsWriteLabel($tablehead, $kolomhead++, "Carabayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Ongkir");
	xlsWriteLabel($tablehead, $kolomhead++, "Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jlh Ok");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Satuan");

	foreach ($this->Tbl_pembelian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_po);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_po);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_pembelian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_sup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->carabayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ongkir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jlh_ok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_satuan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pembelian.doc");

        $data = array(
            'tbl_pembelian_data' => $this->Tbl_pembelian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pembelian/tbl_pembelian_doc',$data);
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */
/* Kevin Ganteng 2020-09-12 12:20:29 */
/* email:admin@kevinewbie.com*/