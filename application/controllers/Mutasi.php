<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_mutasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/mutasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/mutasi/index/';
            $config['first_url'] = base_url() . 'index.php/mutasi/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_mutasi_model->total_rows($q);
        $mutasi = $this->Tbl_mutasi_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mutasi_data' => $mutasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','mutasi/tbl_mutasi_list', $data);
		
		
		
		
		
		
    }
	    
    function autocomplete_aset(){
        
        $this->db->like('nm_Akantor', $_GET['term']);
        $this->db->select('nm_Akantor');
        $asetkantors = $this->db->get('tbl_asetkantor')->result();
		$asetkendaraans = $this->db->get('tbl_asetkendaraan')->result();
        foreach ($asetkantors as $asetkantor) {
            $return_arr[] = $asetkantor->nm_Akantor;
			    
    }
	
	foreach ($asetkendaraans as $asetkendaraan) {
           $return_arr[] = $asetkendaraan->nm_Akantor;
	 
        }
		echo json_encode($return_arr);
}    



    public function read($id) 
    {
        $row = $this->Tbl_mutasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mutasi' => $row->id_mutasi,
		'kd_mutasi' => $row->kd_mutasi,
		'nama_alpro' => $row->nama_alpro,
		'nama_bmutasi' => $row->nama_bmutasi,
		'jumlah' => $row->jumlah,
		'posisi_asetawal' => $row->posisi_asetawal,
		'posisi_asetakhir' => $row->posisi_asetakhir,
		'kondisi' => $row->kondisi,
		'penanggungjawab' => $row->penanggungjawab,
		'nokontrak' => $row->nokontrak,
		'ket' => $row->ket,
	    );
            $this->template->load('template','mutasi/tbl_mutasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mutasi/create_action'),
	    'id_mutasi' => set_value('id_mutasi'),
	    'kd_mutasi' => set_value('kd_mutasi'),
	    'nama_alpro' => set_value('nama_alpro'),
	    'nama_bmutasi' => set_value('nama_bmutasi'),
	    'jumlah' => set_value('jumlah'),
	    'posisi_asetawal' => set_value('posisi_asetawal'),
	    'posisi_asetakhir' => set_value('posisi_asetakhir'),
	    'kondisi' => set_value('kondisi'),
	    'penanggungjawab' => set_value('penanggungjawab'),
	    'nokontrak' => set_value('nokontrak'),
	    'ket' => set_value('ket'),
	);
        $this->template->load('template','mutasi/tbl_mutasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_mutasi' => $this->input->post('kd_mutasi',TRUE),
		'nama_alpro' => $this->input->post('nama_alpro',TRUE),
		'nama_bmutasi' => $this->input->post('nama_bmutasi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'posisi_asetawal' => $this->input->post('posisi_asetawal',TRUE),
		'posisi_asetakhir' => $this->input->post('posisi_asetakhir',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'penanggungjawab' => $this->input->post('penanggungjawab',TRUE),
		'nokontrak' => $this->input->post('nokontrak',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_mutasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('mutasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_mutasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mutasi/update_action'),
		'id_mutasi' => set_value('id_mutasi', $row->id_mutasi),
		'kd_mutasi' => set_value('kd_mutasi', $row->kd_mutasi),
		'nama_alpro' => set_value('nama_alpro', $row->nama_alpro),
		'nama_bmutasi' => set_value('nama_bmutasi', $row->nama_bmutasi),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'posisi_asetawal' => set_value('posisi_asetawal', $row->posisi_asetawal),
		'posisi_asetakhir' => set_value('posisi_asetakhir', $row->posisi_asetakhir),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'penanggungjawab' => set_value('penanggungjawab', $row->penanggungjawab),
		'nokontrak' => set_value('nokontrak', $row->nokontrak),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','mutasi/tbl_mutasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mutasi', TRUE));
        } else {
            $data = array(
		'kd_mutasi' => $this->input->post('kd_mutasi',TRUE),
		'nama_alpro' => $this->input->post('nama_alpro',TRUE),
		'nama_bmutasi' => $this->input->post('nama_bmutasi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'posisi_asetawal' => $this->input->post('posisi_asetawal',TRUE),
		'posisi_asetakhir' => $this->input->post('posisi_asetakhir',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
		'penanggungjawab' => $this->input->post('penanggungjawab',TRUE),
		'nokontrak' => $this->input->post('nokontrak',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tbl_mutasi_model->update($this->input->post('id_mutasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mutasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_mutasi_model->get_by_id($id);

        if ($row) {
            $this->Tbl_mutasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mutasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mutasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_mutasi', 'kd mutasi', 'trim|required');
	$this->form_validation->set_rules('nama_alpro', 'nama alpro', 'trim|required');
	$this->form_validation->set_rules('nama_bmutasi', 'nama bmutasi', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('posisi_asetawal', 'posisi asetawal', 'trim|required');
	$this->form_validation->set_rules('posisi_asetakhir', 'posisi asetakhir', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
	$this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'trim|required');
	$this->form_validation->set_rules('nokontrak', 'nokontrak', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_mutasi', 'id_mutasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_mutasi.xls";
        $judul = "tbl_mutasi";
        $tablehead = 1;
        $tablebody = 2;
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Mutasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Alpro");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Bmutasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Posisi Asetawal");
	xlsWriteLabel($tablehead, $kolomhead++, "Posisi Asetakhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Penanggungjawab");
	xlsWriteLabel($tablehead, $kolomhead++, "Nokontrak");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tbl_mutasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_mutasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_alpro);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_bmutasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->posisi_asetawal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->posisi_asetakhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kondisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penanggungjawab);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nokontrak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
	
	function c_mutasi() {
		
	$no = 1;
								
								
		$sql_mutasik			= 	"SELECT  tm.id_mutasi, tm.kd_mutasi, tm.nama_alpro,tm.nama_bmutasi,tm.jumlah,tm.posisi_asetawal,tm.posisi_asetakhir,tm.kondisi,tm.penanggungjawab,tm.nokontrak
									 FROM tbl_mutasi as tm ";
		
		$this->load->library('pdf');
		$pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'Laporan Mutasi Aset Harmoni', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
       
		 $pdf->Line(20, 17, 210-20, 17); 
		$pdf->Line(20, 18, 210-20, 18);
		 $pdf->Cell(6, 6, '',0,1);
		
		$pdf->Cell(10, 9, 'No', 1, 0, 'C');
        $pdf->Cell(40, 9, 'Kode Mutasi', 1, 0, 'C');
        $pdf->Cell(25, 9, 'Jenis Aset', 1, 0, 'C');
		$pdf->Cell(30, 9, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(35, 9, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(25, 9, 'Kondisi', 1, 0, 'C');
        $pdf->Cell(30, 9, 'P.Jawab', 1, 1, 'C');
		
		
		
		$bjir = $this->db->query($sql_mutasik)->result();
		
		
         foreach ($bjir as $p){
		$pdf->Cell(10, 9, $no, 1, 0, 'C');
        $pdf->Cell(40, 9, $p->kd_mutasi, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->nama_alpro, 1, 0, 'C');
		$pdf->Cell(30, 9, $p->nama_bmutasi, 1, 0, 'C');
		$pdf->Cell(35, 9, $p->jumlah, 1, 0, 'C');
		$pdf->Cell(25, 9, $p->kondisi, 1, 0, 'C');
        $pdf->Cell(30, 9, $p->penanggungjawab, 1, 1, 'C');
		$no++;
		 }
		
		{
        $pdf->Output();
		}
		 
	}

    function gantibmutasi(){

        $tipe_aset = $_GET['tipe_aset'];
        echo "<table class='table table-bordered'>";
        if($tipe_aset=='Kendaraan'){
            echo datalist_dinamis('nama_bmutasi', 'tbl_asetkendaraan', 'nm_Akantor');
            }elseif($tipe_aset=='Kantor'){
            echo datalist_dinamis('nama_bmutasi', 'tbl_asetkantor', 'nm_Akantor');
            }elseif($tipe_aset=='Produksi'){
            echo datalist_dinamis('nama_bmutasi', 'tbl_asetproduksi', 'nama_AsetProduksi');
            }else{
             echo "<tr><td>Tentukan Pilihan Dahulu</td></tr>";
            }
 echo "</table>";

    }

    function hide_kontrak(){

        $posisi_asetakhir = $_GET['posisi_asetakhir'];
        echo "<table class='table table-bordered'>";
        if($posisi_asetakhir=='P'){
            echo "<tr><td width='200'>Nomor Kontrak</td><td><input  type='text'  name='nokontrak' id='nokontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }else{
             echo "<tr><td><input value='-'  type='hidden' readonly name='nokontrak' id='nokontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }
            echo "</table>";

    }

    function hide_kontraks(){

        $posisi_asetawal = $_GET['posisi_asetawal'];
        echo "<table class='table table-bordered'>";
        if($posisi_asetawal=='P'){
            echo "<tr><td width='200'>Nomor Kontrak</td><td><input  type='text'  name='nokontrak' id='nokontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }else{
             echo "<tr><td><input value='-'  type='hidden' readonly name='nokontrak' id='nokontrak' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }
            echo "</table>";

    }


}

