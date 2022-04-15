<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Korona_1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Korona_1_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/korona_1/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/korona_1/index/';
            $config['first_url'] = base_url() . 'index.php/korona_1/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Korona_1_model->total_rows($q);
        $korona_1 = $this->Korona_1_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'korona_1_data' => $korona_1,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','korona_1/korona_1_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Korona_1_model->get_by_id($id);
        if ($row) {
            $data = array(
		'asasas' => $row->asasas,
		'acsasc' => $row->acsasc,
		'ascascasc' => $row->ascascasc,
	    );
            $this->template->load('template','korona_1/korona_1_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('korona_1'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('korona_1/create_action'),
	    'asasas' => set_value('asasas'),
	    'acsasc' => set_value('acsasc'),
	    'ascascasc' => set_value('ascascasc'),
	);
        $this->template->load('template','korona_1/korona_1_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'acsasc' => $this->input->post('acsasc',TRUE),
		'ascascasc' => $this->input->post('ascascasc',TRUE),
	    );

            $this->Korona_1_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('korona_1'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Korona_1_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('korona_1/update_action'),
		'asasas' => set_value('asasas', $row->asasas),
		'acsasc' => set_value('acsasc', $row->acsasc),
		'ascascasc' => set_value('ascascasc', $row->ascascasc),
	    );
            $this->template->load('template','korona_1/korona_1_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('korona_1'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('asasas', TRUE));
        } else {
            $data = array(
		'acsasc' => $this->input->post('acsasc',TRUE),
		'ascascasc' => $this->input->post('ascascasc',TRUE),
	    );

            $this->Korona_1_model->update($this->input->post('asasas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('korona_1'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Korona_1_model->get_by_id($id);

        if ($row) {
            $this->Korona_1_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('korona_1'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('korona_1'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('acsasc', 'acsasc', 'trim|required');
	$this->form_validation->set_rules('ascascasc', 'ascascasc', 'trim|required');

	$this->form_validation->set_rules('asasas', 'asasas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "korona_1.xls";
        $judul = "korona_1";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Acsasc");
	xlsWriteLabel($tablehead, $kolomhead++, "Ascascasc");

	foreach ($this->Korona_1_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->acsasc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ascascasc);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=korona_1.doc");

        $data = array(
            'korona_1_data' => $this->Korona_1_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('korona_1/korona_1_doc',$data);
    }

}

/* End of file Korona_1.php */
/* Location: ./application/controllers/Korona_1.php */
/* Kevin Ganteng 2020-09-11 15:16:09 */
/* email:admin@kevinewbie.com*/