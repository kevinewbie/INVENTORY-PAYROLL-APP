<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_forminputpembelian_model extends CI_Model
{

    public $table = 'tbl_forminputpembelian';
    public $id = 'id_nmr';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_nmr', $q);
	$this->db->or_like('no_po', $q);
	$this->db->or_like('tgl_po', $q);
	$this->db->or_like('no_pembelian', $q);
	$this->db->or_like('id_sup', $q);
	$this->db->or_like('cara_bayar', $q);
	$this->db->or_like('ongkir', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_nmr', $q);
	$this->db->or_like('no_po', $q);
	$this->db->or_like('tgl_po', $q);
	$this->db->or_like('no_pembelian', $q);
	$this->db->or_like('id_sup', $q);
	$this->db->or_like('cara_bayar', $q);
	$this->db->or_like('ongkir', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbl_forminputpembelian_model.php */
/* Location: ./application/models/Tbl_forminputpembelian_model.php */