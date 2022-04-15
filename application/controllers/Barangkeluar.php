<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_barangkeluar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/barangkeluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/barangkeluar/index/';
            $config['first_url'] = base_url() . 'index.php/barangkeluar/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_barangkeluar_model->total_rows($q);
        $barangkeluar = $this->Tbl_barangkeluar_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barangkeluar_data' => $barangkeluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','barangkeluar/tbl_barangkeluar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_barangkeluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'id_barangkeluar' => $row->id_barangkeluar,
		'tgl_barangkeluar' => $row->tgl_barangkeluar,
		'id_barang' => $row->id_barang,
		'jumlah_barangkeluar' => $row->jumlah_barangkeluar,
		'ket' => $row->ket,
		'kode_posisi' => $row->kode_posisi,
		'kode_pekerjaan' => $row->kode_pekerjaan,
	    );
            $this->template->load('template','barangkeluar/tbl_barangkeluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangkeluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barangkeluar/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'id_barangkeluar' => set_value('id_barangkeluar'),
	    'tgl_barangkeluar' => set_value('tgl_barangkeluar'),
	    'id_barang' => set_value('id_barang'),
	    'jumlah_barangkeluar' => set_value('jumlah_barangkeluar'),
	    'ket' => set_value('ket'),
	    'kode_posisi' => set_value('kode_posisi'),
	    'kode_pekerjaan' => set_value('kode_pekerjaan'),
	);
        $this->template->load('template','barangkeluar/tbl_barangkeluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barangkeluar' => $this->input->post('id_barangkeluar',TRUE),
		'tgl_barangkeluar' => $this->input->post('tgl_barangkeluar',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jumlah_barangkeluar' => $this->input->post('jumlah_barangkeluar',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'kode_posisi' => $this->input->post('kode_posisi',TRUE),
		'kode_pekerjaan' => $this->input->post('kode_pekerjaan',TRUE),
	    );

            $this->Tbl_barangkeluar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('barangkeluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_barangkeluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barangkeluar/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'id_barangkeluar' => set_value('id_barangkeluar', $row->id_barangkeluar),
		'tgl_barangkeluar' => set_value('tgl_barangkeluar', $row->tgl_barangkeluar),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'jumlah_barangkeluar' => set_value('jumlah_barangkeluar', $row->jumlah_barangkeluar),
		'ket' => set_value('ket', $row->ket),
		'kode_posisi' => set_value('kode_posisi', $row->kode_posisi),
		'kode_pekerjaan' => set_value('kode_pekerjaan', $row->kode_pekerjaan),
	    );
            $this->template->load('template','barangkeluar/tbl_barangkeluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangkeluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nmr', TRUE));
        } else {
            $data = array(
		'id_barangkeluar' => $this->input->post('id_barangkeluar',TRUE),
		'tgl_barangkeluar' => $this->input->post('tgl_barangkeluar',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jumlah_barangkeluar' => $this->input->post('jumlah_barangkeluar',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'kode_posisi' => $this->input->post('kode_posisi',TRUE),
		'kode_pekerjaan' => $this->input->post('kode_pekerjaan',TRUE),
	    );

            $this->Tbl_barangkeluar_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barangkeluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_barangkeluar_model->get_by_id($id);

        if ($row) {
            $this->Tbl_barangkeluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barangkeluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangkeluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barangkeluar', 'id barangkeluar', 'trim|required');
	$this->form_validation->set_rules('tgl_barangkeluar', 'tgl barangkeluar', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('jumlah_barangkeluar', 'jumlah barangkeluar', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('kode_posisi', 'kode posisi', 'trim|required');
	$this->form_validation->set_rules('kode_pekerjaan', 'kode pekerjaan', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_barangkeluar.xls";
        $judul = "tbl_barangkeluar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barangkeluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Barangkeluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Barangkeluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Posisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pekerjaan");

	foreach ($this->Tbl_barangkeluar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barangkeluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_barangkeluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_barangkeluar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_posisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pekerjaan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_barangkeluar.doc");

        $data = array(
            'tbl_barangkeluar_data' => $this->Tbl_barangkeluar_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barangkeluar/tbl_barangkeluar_doc',$data);
    }


    function hide_kontrak (){
         
        $kode_posisi = $_GET['kode_posisi'];
        echo "<table class='table table-bordered'>";
        if($kode_posisi=='P'){
            echo "<tr><td width='200'>Kode Pekerjaan</td><td><input  type='text'  name='kode_pekerjaan' id='kode_pekerjaan' placeholder='Masukkan Kode Pekerjaan' class='form-control'></td></tr>";
            }elseif ($kode_posisi=='K'){
             echo "<tr><td><input value='-'  type='hidden' readonly=''  name='kode_pekerjaan' id='kode_pekerjaan' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }elseif ($kode_posisi=='W'){
             echo "<tr><td><input value='-'  type='hidden' readonly=''  name='kode_pekerjaan' id='kode_pekerjaan' placeholder='Masukkan Nomor Kontrak' class='form-control'></td></tr>";
            }else{
             echo "<tr><td>Tentukan Pilihan Dahulu</td></tr>";
            }
            echo "</table>";


    }
function cet_kluar (){

        $sql_barangkeluar    =   "SELECT tk.id_barangkeluar, tk.tgl_barangkeluar, tk.id_barang,tk.jumlah_barangkeluar,LEFT (tk.kode_posisi,6) as tk,tk.kode_pekerjaan FROM
                                 tbl_barangkeluar as tk";                         
          
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'Laporan Barang Keluar Harmoni', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
       
         $pdf->Line(20, 17, 210-20, 17); 
        $pdf->Line(20, 18, 210-20, 18);
         $pdf->Cell(6, 6, '',0,1);
        
        $pdf->Cell(10, 9, 'No', 1, 0, 'C');
        $pdf->Cell(40, 9, 'Id Barang Keluar', 1, 0, 'C');
        $pdf->Cell(25, 9, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(37, 9, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(25, 9, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(25, 9, 'Posisi', 1, 0, 'C');
        $pdf->Cell(30, 9, 'No.Kontrak', 1, 1, 'C');
        
        
        
        $bjir = $this->db->query($sql_barangkeluar)->result();
        $no = 1;
         foreach ($bjir as $p){
        $pdf->Cell(10, 9, $no, 1, 0, 'C');
        $pdf->Cell(40, 9, $p->id_barangkeluar, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->tgl_barangkeluar, 1, 0, 'C');
        $pdf->Cell(37, 9, $p->id_barang, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->jumlah_barangkeluar, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->tk, 1, 0, 'C');
        $pdf->Cell(30, 9, $p->kode_pekerjaan, 1, 1, 'C');
        $no++;
         }
         {
        $pdf->Output();
        }

}



}

/* End of file Barangkeluar.php */
/* Location: ./application/controllers/Barangkeluar.php */