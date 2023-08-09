<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MObat extends CI_Model
{
    private $tbl = 'tbl_obat';
    private $view = 'v_obat';

    public function show($where = '')
    {
        $this->db->select('*');
        $this->db->from($this->view);
        if (@$where && $where != null) {
            $this->db->where($where);
        }
        $this->db->order_by('id', 'asc');
        return $this->db->get();
    }

    public function insert($object)
    {
        $this->db->insert($this->tbl, $object);
        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function getObat($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // public function update($where, $object)
    // {
    //     $this->db->where($where);
    //     $this->db->update($this->tbl, $object);
    //     return(($this->db->affected_rows() > 0) ? true : false);
    // }   

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->tbl);
        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function showMax($where = '')
    {
        $this->db->select_max('kode_obat');
        if (@$where && $where != null) {
            $this->db->where($where);
        }
        return $this->db->get($this->view);
    }
}
