<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forminputbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_forminputbarang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/forminputbarang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/forminputbarang/index/';
            $config['first_url'] = base_url() . 'index.php/forminputbarang/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_forminputbarang_model->total_rows($q);
        $forminputbarang = $this->Tbl_forminputbarang_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);
		

        $data = array(
            'forminputbarang_data' => $forminputbarang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		
		$barang = "SELECT ip.nm_barang,ip.id_barang FROM tbl_forminputbarang as ip WHERE stoktersedia >= '100'";
	    $data['brg']	 = $this->db->query($barang)->result();
		$data ['brgMelebihiBatas']="";
		foreach ($data['brg'] as $brg){
		$data['brgMelebihiBatas'].=$brg->nm_barang.",";
	
	}
	

        $this->template->load('template','forminputbarang/tbl_forminputbarang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_forminputbarang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nmr' => $row->id_nmr,
		'id_barang' => $row->id_barang,
		'nm_barang' => $row->nm_barang,
		'satuan' => $row->satuan,
		'minstok' => $row->minstok,
		'maxstok' => $row->maxstok,
		'stoktersedia' => $row->stoktersedia,
		'kisaran_hargasatuan' => $row->kisaran_hargasatuan,
	    );
            $this->template->load('template','forminputbarang/tbl_forminputbarang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('forminputbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('forminputbarang/create_action'),
	    'id_nmr' => set_value('id_nmr'),
	    'id_barang' => set_value('id_barang'),
	    'nm_barang' => set_value('nm_barang'),
	    'satuan' => set_value('satuan'),
	    'minstok' => set_value('minstok'),
	    'maxstok' => set_value('maxstok'),
	    'stoktersedia' => set_value('stoktersedia'),
	    'kisaran_hargasatuan' => set_value('kisaran_hargasatuan'),
	);
        $this->template->load('template','forminputbarang/tbl_forminputbarang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'minstok' => $this->input->post('minstok',TRUE),
		'maxstok' => $this->input->post('maxstok',TRUE),
		'stoktersedia' => $this->input->post('stoktersedia',TRUE),
		'kisaran_hargasatuan' => $this->input->post('kisaran_hargasatuan',TRUE),
	    );

            $this->Tbl_forminputbarang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('forminputbarang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_forminputbarang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('forminputbarang/update_action'),
		'id_nmr' => set_value('id_nmr', $row->id_nmr),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'nm_barang' => set_value('nm_barang', $row->nm_barang),
		'satuan' => set_value('satuan', $row->satuan),
		'minstok' => set_value('minstok', $row->minstok),
		'maxstok' => set_value('maxstok', $row->maxstok),
		'stoktersedia' => set_value('stoktersedia', $row->stoktersedia),
		'kisaran_hargasatuan' => set_value('kisaran_hargasatuan', $row->kisaran_hargasatuan),
	    );
            $this->template->load('template','forminputbarang/tbl_forminputbarang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('forminputbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nmr', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'minstok' => $this->input->post('minstok',TRUE),
		'maxstok' => $this->input->post('maxstok',TRUE),
		'stoktersedia' => $this->input->post('stoktersedia',TRUE),
		'kisaran_hargasatuan' => $this->input->post('kisaran_hargasatuan',TRUE),
	    );

            $this->Tbl_forminputbarang_model->update($this->input->post('id_nmr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('forminputbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_forminputbarang_model->get_by_id($id);

        if ($row) {
            $this->Tbl_forminputbarang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('forminputbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('forminputbarang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('nm_barang', 'nm barang', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('minstok', 'minstok', 'trim|required');
	$this->form_validation->set_rules('maxstok', 'maxstok', 'trim|required');
	$this->form_validation->set_rules('stoktersedia', 'stoktersedia', 'trim|required');
	$this->form_validation->set_rules('kisaran_hargasatuan', 'kisaran hargasatuan', 'trim|required');

	$this->form_validation->set_rules('id_nmr', 'id_nmr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_forminputbarang.xls";
        $judul = "tbl_forminputbarang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Minstok");
	xlsWriteLabel($tablehead, $kolomhead++, "Maxstok");
	xlsWriteLabel($tablehead, $kolomhead++, "Stoktersedia");
	xlsWriteLabel($tablehead, $kolomhead++, "Kisaran Hargasatuan");

	foreach ($this->Tbl_forminputbarang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nm_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->satuan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->minstok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->maxstok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stoktersedia);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kisaran_hargasatuan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_forminputbarang.doc");

        $data = array(
            'tbl_forminputbarang_data' => $this->Tbl_forminputbarang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('forminputbarang/tbl_forminputbarang_doc',$data);
    }
	
    function print_pdf(){
        $sql_barang    =   "SELECT br.id_barang, br.nm_barang, br.minstok,br.maxstok,br.stoktersedia,br.kisaran_hargasatuan FROM tbl_forminputbarang as br";                         
          
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'Laporan Master Barang', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
       
         $pdf->Line(20, 17, 210-20, 17); 
        $pdf->Line(20, 18, 210-20, 18);
         $pdf->Cell(6, 6, '',0,1);
        
        $pdf->Cell(10, 9, 'No', 1, 0, 'C');
        $pdf->Cell(40, 9, 'Id Barang', 1, 0, 'C');
        $pdf->Cell(37, 9, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(25, 9, 'Minstok', 1, 0, 'C');
        $pdf->Cell(25, 9, 'MaxStok', 1, 0, 'C');
        $pdf->Cell(25, 9, 'S.Tersedia', 1, 0, 'C');
        $pdf->Cell(30, 9, 'Kisaran Harga', 1, 1, 'C');
        
        
        
        $bjir = $this->db->query($sql_barang)->result();
        $no = 1;
         foreach ($bjir as $p){
        $pdf->Cell(10, 9, $no, 1, 0, 'C');
        $pdf->Cell(40, 9, $p->id_barang, 1, 0, 'C');
        $pdf->Cell(37, 9, $p->nm_barang, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->minstok, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->maxstok, 1, 0, 'C');
        $pdf->Cell(25, 9, $p->stoktersedia, 1, 0, 'C');
        $pdf->Cell(30, 9, $p->kisaran_hargasatuan, 1, 1, 'C');
        $no++;
         }
         {
        $pdf->Output();
        }



    }
	


}

/* End of file Forminputbarang.php */
/* Location: ./application/controllers/Forminputbarang.php */