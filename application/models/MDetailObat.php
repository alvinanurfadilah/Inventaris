<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDetailObat extends CI_Model
{
    private $tbl = 'tbl_detail_obat';
    private $view = 'v_detail_obat';

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

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $object)
    {
        $this->db->where($where);
        $this->db->update($this->tbl, $object);
        return (($this->db->affected_rows() > 0) ? true : false);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->tbl);
        return (($this->db->affected_rows() > 0) ? true : false);
    }

    // public function sumStok($where)
    // {
    //     $this->db->select_sum('stock');

    //     $this->db->where($where);

    //     return $this->db->get($where);
    // }

    public function getDetail($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function sumStock()
    {
        $query = "SELECT `obat_id`, SUM(`stock`)
        FROM `tbl_detail_obat`
        GROUP BY `obat_id`";

        return $this->db->query($query);
    }
}
