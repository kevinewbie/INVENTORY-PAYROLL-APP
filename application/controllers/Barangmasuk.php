<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_barangmasuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/barangmasuk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/barangmasuk/index/';
            $config['first_url'] = base_url() . 'index.php/barangmasuk/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_barangmasuk_model->total_rows($q);
        $barangmasuk = $this->Tbl_barangmasuk_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barangmasuk_data' => $barangmasuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','barangmasuk/tbl_barangmasuk_list', $data);
    }
	function detail (){
		$no_detail = substr($this->uri->uri_string(3),19);
		$sql_barangmasuk 	= 	"SELECT tm.id_nmr, tm.id_barangmasuk, tm.tgl_barangmasuk, tm.no_faktur FROM
								tbl_barangmasuk as tm
								WHERE tm.id_nmr='$no_detail'";
								
		$sql_ditel			= "SELECT tm.id_nmr, tm.id_barangmasuk, tm.tgl_barangmasuk, tm.no_faktur,dm.id_barang,dm.jlh_masuk,dm.kd_posisi,dm.no_kontrak,dm.id_nmr FROM
								tbl_barangmasuk as tm,tbl_detailbarangmasuk as dm
								WHERE tm.id_nmr=dm.no_detail AND tm.id_nmr='$no_detail'";
								
								
		$data['masuk'] 	 = 	$this->db->query($sql_barangmasuk)->row_array();
		$data['ditel']	 = $this->db->query($sql_ditel)->result();
		$data['no_detail']  = $no_detail;
	
	
	
		$this->template->load('template','barangmasuk/detail',$data);
			
	}
	

    public function read($id) 
    {
        $row = $this->Tbl_barangmasuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'id_barangmasuk' => $row->id_barangmasuk,
		'tgl_barangmasuk' => $row->tgl_barangmasuk,
		'no_faktur' => $row->no_faktur,
	    );
            $this->template->load('template','barangmasuk/tbl_barangmasuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangmasuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barangmasuk/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'id_barangmasuk' => set_value('id_barangmasuk'),
	    'tgl_barangmasuk' => set_value('tgl_barangmasuk'),
	    'no_faktur' => set_value('no_faktur'),
	);
        $this->template->load('template','barangmasuk/tbl_barangmasuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barangmasuk' => $this->input->post('id_barangmasuk',TRUE),
		'tgl_barangmasuk' => $this->input->post('tgl_barangmasuk',TRUE),
		'no_faktur' => $this->input->post('no_faktur',TRUE),
	    );

            $this->Tbl_barangmasuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
             $fakyu=$this->db->insert_id();
            redirect(site_url('barangmasuk/update/'.$fakyu));
        }
    }
    
    public function update($id) 
    {


    
        $row = $this->Tbl_barangmasuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barangmasuk/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'id_barangmasuk' => set_value('id_barangmasuk', $row->id_barangmasuk),
		'tgl_barangmasuk' => set_value('tgl_barangmasuk', $row->tgl_barangmasuk),
		'no_faktur' => set_value('no_faktur', $row->no_faktur),
	    );

        $no_detail = substr($this->uri->uri_string(3),19);
        $sql_barangmasuk    =   "SELECT tm.id_nmr, tm.id_barangmasuk, tm.tgl_barangmasuk, tm.no_faktur FROM
                                tbl_barangmasuk as tm
                                WHERE tm.id_nmr='$no_detail'";
                                
        $sql_ditel          = "SELECT tm.id_nmr, tm.id_barangmasuk, tm.tgl_barangmasuk, tm.no_faktur,dm.id_barang,dm.jlh_masuk,dm.kd_posisi,dm.no_kontrak,dm.id_nmr FROM
                                tbl_barangmasuk as tm,tbl_detailbarangmasuk as dm
                                WHERE tm.id_nmr=dm.no_detail AND tm.id_nmr='$no_detail'";
                                
                                
        $data['masuk']   =  $this->db->query($sql_barangmasuk)->row_array();
        $data['ditel']   = $this->db->query($sql_ditel)->result();
        $data['no_detail']  = $no_detail;



            $this->template->load('template','barangmasuk/tbl_barangmasuk_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangmasuk'));
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
		'tgl_barangmasuk' => $this->input->post('tgl_barangmasuk',TRUE),
		'no_faktur' => $this->input->post('no_faktur',TRUE),
	    );

            $this->Tbl_barangmasuk_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barangmasuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_barangmasuk_model->get_by_id($id);

        if ($row) {
            $this->Tbl_barangmasuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barangmasuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangmasuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barangmasuk', 'id barangmasuk', 'trim|required');
	$this->form_validation->set_rules('tgl_barangmasuk', 'tgl barangmasuk', 'trim|required');
	$this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_barangmasuk.xls";
        $judul = "tbl_barangmasuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Barangmasuk");
	xlsWriteLabel($tablehead, $kolomhead++, "No Faktur");

	foreach ($this->Tbl_barangmasuk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barangmasuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_barangmasuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_barangmasuk.doc");

        $data = array(
            'tbl_barangmasuk_data' => $this->Tbl_barangmasuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barangmasuk/tbl_barangmasuk_doc',$data);
    }
	
	function masuk_action (){
		
		 $no_detail 		= $this->input->post('no_detail');
		 $id_barangmasuk 	= $this->input->post('id_barangmasuk');
		 $id_barang			= $this->input->post('id_barang');
		 $jlh_masuk			= $this->input->post('jlh_masuk');
		 $kd_posisi    		= $this->input->post('kd_posisi');
		$no_kontrak    	= $this->input->post('no_kontrak');
		 
		 $data = array	('no_detail'  	    =>  $no_detail,
						 'id_barangmasuk'   =>  $id_barangmasuk,
						 'id_barang'      	=>  $id_barang,
						 'jlh_masuk' 		=>  $jlh_masuk,
                         'kd_posisi'  		=>  $kd_posisi,
						 'no_kontrak' 		=>  $no_kontrak);
						 
		 
						 
						 
		$this->db->insert('tbl_detailbarangmasuk',$data);
		redirect(site_url('barangmasuk/update/'.$no_detail));
	}
	
	function hide_kontrak (){
		 
        $kd_posisi = $_GET['kd_posisi'];
        echo "<table class='table table-bordered'>";
        if($kd_posisi=='P'){
            echo "<tr><td width='200'>Nomor Kontrak</td><td><input  type='text'  name='no_kontrak' id='no_kontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }elseif ($kd_posisi=='K'){
             echo "<tr><td><input value='-'  type='hidden' readonly=''  name='no_kontrak' id='no_kontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }elseif ($kd_posisi=='W'){
             echo "<tr><td><input value='-'  type='hidden' readonly=''  name='no_kontrak' id='no_kontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }else{
             echo "<tr><td>Tentukan Pilihan Dahulu</td></tr>";
            }
            echo "</table>";


	}
	function hapus_ajax (){
		$id_nmr = $_GET['id_nmr'];
        $this->db->where('id_nmr',$id_nmr);
        $this->db->delete('tbl_detailbarangmasuk');
		
		
		 
	}
	
	function c_laporanm() {
		$sql_barangmasuk 	= 	"SELECT tm.id_nmr, tm.id_barangmasuk, tm.tgl_barangmasuk, tm.no_faktur FROM
								 tbl_barangmasuk as tm";
								
								
		$sql_ditel			= 	"SELECT tm.id_nmr, tm.id_barangmasuk, tm.tgl_barangmasuk, tm.no_faktur,dm.id_barang,dm.jlh_masuk,dm.no_kontrak,dm.id_nmr,LEFT (dm.kd_posisi,6) as dm   FROM
								 tbl_barangmasuk as tm,tbl_detailbarangmasuk as dm
								 WHERE tm.id_nmr=dm.no_detail ";
		
		$this->load->library('pdf');
		$pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'Laporan Barang Masuk Harmoni', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
       
		 $pdf->Line(20, 17, 210-20, 17); 
        $pdf->Line(20, 18, 210-20, 18);
		 $pdf->Cell(6, 6, '',0,1);
		
		$pdf->Cell(10, 9, 'No', 1, 0, 'C');
        $pdf->Cell(40, 9, 'Id Barang Masuk', 1, 0, 'C');
        $pdf->Cell(25, 9, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(30, 9, 'No Faktur', 1, 0, 'C');
		$pdf->Cell(37, 9, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(25, 9, 'jumlah', 1, 0, 'C');
        $pdf->Cell(30, 9, 'Posisi', 1, 1, 'C');
		
		
		
		$bjir = $this->db->query($sql_ditel)->result();
		$no = 1;
         foreach ($bjir as $p){
		$pdf->Cell(10, 9, $no, 1, 0, 'C');
        $pdf->Cell(40, 9, $p->id_barangmasuk, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->tgl_barangmasuk, 1, 0, 'C');
		$pdf->Cell(30, 9, $p->no_faktur, 1, 0, 'C');
		$pdf->Cell(37, 9, $p->id_barang, 1, 0, 'C');
		$pdf->Cell(25, 9, $p->jlh_masuk, 1, 0, 'C');
        $pdf->Cell(30, 9, $p->dm, 1, 1, 'C');
		$no++;
		 }
		 {
        $pdf->Output();
		}
		 
	}
}

/* End of file Barangmasuk.php */
/* Location: ./application/controllers/Barangmasuk.php */