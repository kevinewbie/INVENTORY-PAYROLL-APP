<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_abangunan_model extends CI_Model
{

    public $table = 'tbl_abangunan';
    public $id = 'id_asetbangunan';
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
        $this->db->like('id_asetbangunan', $q);
	$this->db->or_like('kd_jenis', $q);
	$this->db->or_like('kode_bangunan', $q);
	$this->db->or_like('nama_bangunan', $q);
	$this->db->or_like('lokasi', $q);
	$this->db->or_like('asal', $q);
	$this->db->or_like('no_sertifikat', $q);
	$this->db->or_like('luas', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('kondisi', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('ket', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_asetbangunan', $q);
	$this->db->or_like('kd_jenis', $q);
	$this->db->or_like('kode_bangunan', $q);
	$this->db->or_like('nama_bangunan', $q);
	$this->db->or_like('lokasi', $q);
	$this->db->or_like('asal', $q);
	$this->db->or_like('no_sertifikat', $q);
	$this->db->or_like('luas', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('kondisi', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('status', $q);
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

