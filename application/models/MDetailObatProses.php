<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class MDetailObatProses extends CI_Model
{
    private $tbl = 'tbl_detail_obat_proses';
    private $view = 'v_detail_obat_proses';

    public function show($where='')
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
        return(($this->db->affected_rows() > 0) ? true : false);
    }

    public function update($where, $object)
    {
        $this->db->where($where);
        $this->db->update($this->tbl, $object);
        return(($this->db->affected_rows() > 0) ? true : false);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->tbl);
        return(($this->db->affested_rows() > 0) ? true : false);
    }

    public function newStok($where)
    {
        $this->db->select_sum('jml_obat');
        $this->db->where($where);
        return $this->db->get($this->view);
    }

    public function search($where='')
    {
        $this->db->select('kode_obat');
        if (@$where && $where != null) {
            $this->db->where($where);
        }
        return $this->db->get($this->view);
    }
}
