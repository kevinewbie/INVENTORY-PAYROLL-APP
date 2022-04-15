<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forminputpembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_forminputpembelian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/forminputpembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/forminputpembelian/index/';
            $config['first_url'] = base_url() . 'index.php/forminputpembelian/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_forminputpembelian_model->total_rows($q);
        $forminputpembelian = $this->Tbl_forminputpembelian_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'forminputpembelian_data' => $forminputpembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','forminputpembelian/tbl_forminputpembelian_list', $data);
    }
	
	function detail (){
		
	
	
	}

    public function read($id) 
    {
        $row = $this->Tbl_forminputpembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'no_po' => $row->no_po,
		'tgl_po' => $row->tgl_po,
		'no_pembelian' => $row->no_pembelian,
		'id_sup' => $row->id_sup,
		'cara_bayar' => $row->cara_bayar,
		'ongkir' => $row->ongkir,
	    );
            $this->template->load('template','forminputpembelian/tbl_forminputpembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('forminputpembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('forminputpembelian/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'no_po' => set_value('no_po'),
	    'tgl_po' => set_value('tgl_po'),
	    'no_pembelian' => set_value('no_pembelian'),
	    'id_sup' => set_value('id_sup'),
	    'cara_bayar' => set_value('cara_bayar'),
	    'ongkir' => set_value('ongkir'),
	);
        $this->template->load('template','forminputpembelian/tbl_forminputpembelian_form', $data);
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
		'cara_bayar' => $this->input->post('cara_bayar',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
	    );

            $this->Tbl_forminputpembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
             $fakyu=$this->db->insert_id();
             redirect(site_url('forminputpembelian/update/'.$fakyu));
            redirect(site_url('forminputpembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_forminputpembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('forminputpembelian/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'no_po' => set_value('no_po', $row->no_po),
		'tgl_po' => set_value('tgl_po', $row->tgl_po),
		'no_pembelian' => set_value('no_pembelian', $row->no_pembelian),
		'id_sup' => set_value('id_sup', $row->id_sup),
		'cara_bayar' => set_value('cara_bayar', $row->cara_bayar),
		'ongkir' => set_value('ongkir', $row->ongkir),
	    );

$no_detail = substr($this->uri->uri_string(3),26);
    $sql_pembelian ="SELECT ip.no_po, ip.tgl_po, ip.no_pembelian, ip.cara_bayar, ip.ongkir FROM
                    tbl_forminputpembelian as ip
                    WHERE  ip.id_nmr='$no_detail'";
    $sql_dethail = "SELECT ip.*,dx.no_detail,dx.jlh_ok,dx.harga_satuan,dx.barang,dx.id_nmr
                    FROM tbl_forminputpembelian as ip, tbl_detailpembelian as dx
                    WHERE ip.id_nmr=dx.no_detail and ip.id_nmr='$no_detail'";
                    
     
     $data['beli']       = $this->db->query($sql_pembelian)->row_array();
     $data['no_detail']  = $no_detail;
     $data['dethail']    = $this->db->query($sql_dethail)->result();
     
            $this->template->load('template','forminputpembelian/tbl_forminputpembelian_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('forminputpembelian'));
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
		'cara_bayar' => $this->input->post('cara_bayar',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
	    );

            $this->Tbl_forminputpembelian_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('forminputpembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_forminputpembelian_model->get_by_id($id);

        if ($row) {
            $this->Tbl_forminputpembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('forminputpembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('forminputpembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_po', 'no po', 'trim|required');
	$this->form_validation->set_rules('tgl_po', 'tgl po', 'trim|required');
	$this->form_validation->set_rules('no_pembelian', 'no pembelian', 'trim|required');
	$this->form_validation->set_rules('id_sup', 'id sup', 'trim|required');
	$this->form_validation->set_rules('cara_bayar', 'cara bayar', 'trim|required');
	$this->form_validation->set_rules('ongkir', 'ongkir', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_forminputpembelian.xls";
        $judul = "tbl_forminputpembelian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Cara Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Ongkir");

	foreach ($this->Tbl_forminputpembelian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_po);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_po);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_pembelian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_sup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cara_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ongkir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_forminputpembelian.doc");

        $data = array(
            'tbl_forminputpembelian_data' => $this->Tbl_forminputpembelian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('forminputpembelian/tbl_forminputpembelian_doc',$data);
    }
	
	function pembelian_action (){
		 $no_detail 	= $this->input->post('no_detail');
		 $barang  		= $this->input->post('barang');
		 $jlh_ok  		= $this->input->post('jlh_ok');
		 $harga_satuan  = $this->input->post('harga_satuan');
		 
		 $data = array	( 'no_detail'   	=>  $no_detail,
						 'barang'      	=>  $barang,
                         'jlh_ok'  		=>  $jlh_ok,
						 'harga_satuan' =>  $harga_satuan);
						 
		$this->db->insert('tbl_detailpembelian',$data);
		redirect(site_url('forminputpembelian/update/'.$no_detail));
		
		
                     
	}
	
	function hapus_ajax (){
		$id_nmr = $_GET['id_nmr'];
        $this->db->where('id_nmr',$id_nmr);
        $this->db->delete('tbl_detailpembelian');
		
		
		 
	}
	 
	}

/* End of file Forminputpembelian.php */
/* Location: ./application/controllers/Forminputpembelian.php */