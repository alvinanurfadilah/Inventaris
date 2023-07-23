<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class MObat extends CI_Model
{
    private $obat = 'obat';
    private $v_obat = 'v_obat'; 

    public function show($where='')
    {
        $this->db->select('*');
        $this->db->from($this->v_obat);
        if(@$where && $where != null)
        {
            $this->db->where($where);
        }
        //$this->db->order_by('id', 'asc');
        return $this->db->get();
    }  

    public function insert($object)
    {
        $this->db->insert($this->obat, $object);
        return(($this->db->affected_rows() > 0) ? true : false);
    }

    public function update($where, $object)
    {
        $this->db->where($where);
        $this->db->update($this->obat, $object);
        return(($this->db->affected_rows() > 0) ? true : false);
    }   

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->obat);
        return(($this->db->affected_rows() > 0) ? true : false);
    }

    public function showMax($where='')
    {
        $this->db->select_max('kode_barang');
        if (@$where && $where != null) {
            $this->db->where($where);
        }
        return $this->db->get($this->v_barang);
    }
}
?>