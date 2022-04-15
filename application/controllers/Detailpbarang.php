<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailpbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_detailpbarang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/detailpbarang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/detailpbarang/index/';
            $config['first_url'] = base_url() . 'index.php/detailpbarang/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_detailpbarang_model->total_rows($q);
        $detailpbarang = $this->Tbl_detailpbarang_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailpbarang_data' => $detailpbarang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','detailpbarang/tbl_detailpbarang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_detailpbarang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'no_detail' => $row->no_detail,
		'no_pb' => $row->no_pb,
		'id_barang' => $row->id_barang,
		'jlh_satuan' => $row->jlh_satuan,
	    );
            $this->template->load('template','detailpbarang/tbl_detailpbarang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailpbarang/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'no_detail' => set_value('no_detail'),
	    'no_pb' => set_value('no_pb'),
	    'id_barang' => set_value('id_barang'),
	    'jlh_satuan' => set_value('jlh_satuan'),
	);
        $this->template->load('template','detailpbarang/tbl_detailpbarang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_detail' => $this->input->post('no_detail',TRUE),
		'no_pb' => $this->input->post('no_pb',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jlh_satuan' => $this->input->post('jlh_satuan',TRUE),
	    );

            $this->Tbl_detailpbarang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('detailpbarang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_detailpbarang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailpbarang/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'no_detail' => set_value('no_detail', $row->no_detail),
		'no_pb' => set_value('no_pb', $row->no_pb),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'jlh_satuan' => set_value('jlh_satuan', $row->jlh_satuan),
	    );
            $this->template->load('template','detailpbarang/tbl_detailpbarang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nmr', TRUE));
        } else {
            $data = array(
		'no_detail' => $this->input->post('no_detail',TRUE),
		'no_pb' => $this->input->post('no_pb',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jlh_satuan' => $this->input->post('jlh_satuan',TRUE),
	    );

            $this->Tbl_detailpbarang_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailpbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_detailpbarang_model->get_by_id($id);

        if ($row) {
            $this->Tbl_detailpbarang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailpbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailpbarang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_detail', 'no detail', 'trim|required');
	$this->form_validation->set_rules('no_pb', 'no pb', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('jlh_satuan', 'jlh satuan', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_detailpbarang.xls";
        $judul = "tbl_detailpbarang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "No Pb");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jlh Satuan");

	foreach ($this->Tbl_detailpbarang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_detail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_pb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jlh_satuan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_detailpbarang.doc");

        $data = array(
            'tbl_detailpbarang_data' => $this->Tbl_detailpbarang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detailpbarang/tbl_detailpbarang_doc',$data);
    }

}

/* End of file Detailpbarang.php */
/* Location: ./application/controllers/Detailpbarang.php */
/* Kevin Ganteng 2020-09-18 05:24:43 */
/* email:admin@kevinewbie.com*/