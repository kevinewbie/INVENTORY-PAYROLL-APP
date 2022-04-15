<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permintaanbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_permintaanbarang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/permintaanbarang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/permintaanbarang/index/';
            $config['first_url'] = base_url() . 'index.php/permintaanbarang/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_permintaanbarang_model->total_rows($q);
        $permintaanbarang = $this->Tbl_permintaanbarang_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permintaanbarang_data' => $permintaanbarang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','permintaanbarang/tbl_permintaanbarang_list', $data);
    }
	
	

	
	
	

    public function read($id) 
    {
        $row = $this->Tbl_permintaanbarang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nomor_pb' => $row->nomor_pb,
		'tanggal' => $row->tanggal,
		'status_pb' => $row->status_pb,
		'kd_posisi' => $row->kd_posisi,
		'no_kontrak' => $row->no_kontrak,
	    );
            $this->template->load('template','permintaanbarang/tbl_permintaanbarang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaanbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permintaanbarang/create_action'),
	    'id' => set_value('id'),
	    'nomor_pb' => set_value('nomor_pb'),
	    'tanggal' => set_value('tanggal'),
	    'status_pb' => set_value('status_pb'),
	    'kd_posisi' => set_value('kd_posisi'),
	    'no_kontrak' => set_value('no_kontrak'),
	);
        $this->template->load('template','permintaanbarang/tbl_permintaanbarang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_pb' => $this->input->post('nomor_pb',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'status_pb' => $this->input->post('status_pb',TRUE),
		'kd_posisi' => $this->input->post('kd_posisi',TRUE),
		'no_kontrak' => $this->input->post('no_kontrak',TRUE),
	    );

            $this->Tbl_permintaanbarang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            $fakyu=$this->db->insert_id();
            redirect(site_url('permintaanbarang/update/'.$fakyu));
        }
    }
    
    public function update($id) 
    {

        $row = $this->Tbl_permintaanbarang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permintaanbarang/update_action'),
		'id' => set_value('id', $row->id),
		'nomor_pb' => set_value('nomor_pb', $row->nomor_pb),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'status_pb' => set_value('status_pb', $row->status_pb),
		'kd_posisi' => set_value('kd_posisi', $row->kd_posisi),
		'no_kontrak' => set_value('no_kontrak', $row->no_kontrak),
	    );


         $no_detail = substr($this->uri->uri_string(3),24);

        $sql_d3tail      =   "SELECT pb.id,pb.nomor_pb,pb.status_pb,pb.kd_posisi,pb.no_kontrak,db.no_detail,db.no_pb,db.id_barang,db.jlh_satuan,db.id_nmr
                            FROM tbl_permintaanbarang as pb, tbl_detailpbarang as db
                            WHERE pb.id=db.no_detail and pb.id='$no_detail'";                  
        $sql_permintaan =   "SELECT pb.id,pb.nomor_pb,pb.status_pb,pb.kd_posisi,pb.no_kontrak
                            FROM tbl_permintaanbarang as pb
                            WHERE  pb.id='$no_detail'";                    
        $data['minta']      =  $this->db->query($sql_permintaan)->row_array();
        $data['no_detail']  = $no_detail;
        $data['dethail']    = $this->db->query($sql_d3tail)->result();  
         $this->template->load('template','permintaanbarang/tbl_permintaanbarang_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaanbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nomor_pb' => $this->input->post('nomor_pb',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'status_pb' => $this->input->post('status_pb',TRUE),
		'kd_posisi' => $this->input->post('kd_posisi',TRUE),
		'no_kontrak' => $this->input->post('no_kontrak',TRUE),
	    );

            $this->Tbl_permintaanbarang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permintaanbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_permintaanbarang_model->get_by_id($id);

        if ($row) {
            $this->Tbl_permintaanbarang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permintaanbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permintaanbarang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_pb', 'nomor pb', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('status_pb', 'status pb', 'trim|required');
	$this->form_validation->set_rules('kd_posisi', 'kd posisi', 'trim|required');
	$this->form_validation->set_rules('no_kontrak', 'no kontrak', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_permintaanbarang.xls";
        $judul = "tbl_permintaanbarang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Pb");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Pb");
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Posisi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kontrak");

	foreach ($this->Tbl_permintaanbarang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_pb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_pb);
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
        header("Content-Disposition: attachment;Filename=tbl_permintaanbarang.doc");

        $data = array(
            'tbl_permintaanbarang_data' => $this->Tbl_permintaanbarang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('permintaanbarang/tbl_permintaanbarang_doc',$data);
    }
	
	function permintaan_action (){
		 $no_detail 	= $this->input->post('no_detail');
		 $no_pb			= $this->input->post('no_pb');
		 $id_barang		= $this->input->post('id_barang');
		 $jlh_satuan    = $this->input->post('jlh_satuan');
		 
		 $data = array	('no_detail'   	=>  $no_detail,
						 'no_pb'      	=>  $no_pb,
                         'id_barang'  	=>  $id_barang,
						 'jlh_satuan' 	=>  $jlh_satuan);
						 
		$this->db->insert('tbl_detailpbarang',$data);
		  redirect(site_url('permintaanbarang/update/'.$no_detail));
		
		
                     
	}
	function hapus_ajax (){
		$id_nmr = $_GET['id_nmr'];
        $this->db->where('id_nmr',$id_nmr);
        $this->db->delete('tbl_detailpbarang');
		
		
		 
	}


    function hide_kontrak(){
        $kodeotomatisp = otomatisp();
        $kodeotomatisk = otomatisk();
        $kodeotomatisw = otomatisw();
        $kd_posisi = $_GET['kd_posisi'];
        echo "<table class='table table-bordered'>";
        if($kd_posisi=='P'){
            echo "<tr><td width='200'>Nomor Kontrak</td><td><input  type='text'  name='no_kontrak' id='no_kontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>",
                 "<tr><td width='200'>Nomor Permintaan Barang</td><td><input  type='text'  name='nomor_pb' value='$kodeotomatisp' readonly='' id='nomor_pb' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }elseif ($kd_posisi=='K'){
             echo "<tr><td><input value='-'type='hidden' readonly name='no_kontrak' id='no_kontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>",
                  "<tr><td width='200'>Nomor Permintaan Barang</td><td><input  type='text'  name='nomor_pb' value='$kodeotomatisk' readonly='' id='nomor_pb' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }
            elseif ($kd_posisi=='W'){
             echo "<tr><td><input value='-'type='hidden' readonly name='no_kontrak' id='no_kontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>",
                  "<tr><td width='200'>Nomor Permintaan Barang</td><td><input  type='text'  name='nomor_pb' value='$kodeotomatisw' readonly='' id='nomor_pb' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }else{
             echo "<tr><td>Tentukan Pilihan Dahulu</td></tr>";
            }
            echo "</table>";

    }


}

/* End of file Permintaanbarang.php */
/* Location: ./application/controllers/Permintaanbarang.php */
/* Kevin Ganteng 2020-09-17 13:36:19 */
/* email:admin@kevinewbie.com*/