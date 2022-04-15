<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Korona_1_model extends CI_Model
{

    public $table = 'korona_1';
    public $id = 'asasas';
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
        $this->db->like('asasas', $q);
	$this->db->or_like('acsasc', $q);
	$this->db->or_like('ascascasc', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('asasas', $q);
	$this->db->or_like('acsasc', $q);
	$this->db->or_like('ascascasc', $q);
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

/* End of file Korona_1_model.php */
/* Location: ./application/models/Korona_1_model.php */
/* Please DO NOT modify this information : */
/* Kevin Ganteng 2020-09-11 15:16:09 */
/* kevinewbie.com */