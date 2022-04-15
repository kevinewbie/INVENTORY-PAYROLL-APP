<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_asetproduksi_model extends CI_Model
{

    public $table = 'tbl_asetproduksi';
    public $id = 'id_asetproduksi';
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
        $this->db->like('id_asetproduksi', $q);
	$this->db->or_like('kd_jenis', $q);
	$this->db->or_like('kd_Aproduksi', $q);
	$this->db->or_like('nama_AsetProduksi', $q);
	$this->db->or_like('merk', $q);
	$this->db->or_like('asal', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('ukuran', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('kondisi', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('spek_lain', $q);
	$this->db->or_like('ket', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_asetproduksi', $q);
	$this->db->or_like('kd_jenis', $q);
	$this->db->or_like('kd_Aproduksi', $q);
	$this->db->or_like('nama_AsetProduksi', $q);
	$this->db->or_like('merk', $q);
	$this->db->or_like('asal', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('ukuran', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('kondisi', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('spek_lain', $q);
	$this->db->or_like('ket', $q);
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

