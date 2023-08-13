<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPasien extends CI_Model
{
    private $tbl = 'tbl_pasien';

    public function show($where = '')
    {
        $this->db->select('*');
        $this->db->from($this->tbl);
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

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->tbl);
        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function getPasien($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
