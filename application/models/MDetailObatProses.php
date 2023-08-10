<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDetailObatProses extends CI_Model
{
    private $tbl = 'tbl_detail_obat_proses';
    private $view = 'v_detail_obat_proses';

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

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // public function delete($where)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($this->tbl);
    //     return (($this->db->affested_rows() > 0) ? true : false);
    // }

    public function delete($id)
    {
        $sql = "DELETE `tbl_detail_obat_proses`, `tbl_detail_obat`, `tbl_obat_proses`
        FROM `tbl_detail_obat_proses`, `tbl_detail_obat`, `tbl_obat_proses`
        WHERE `tbl_detail_obat_proses`.`detail_obat_id` = `tbl_detail_obat`.`id`
        AND `tbl_detail_obat_proses`.`obat_proses_id` = `tbl_obat_proses`.`id`
        AND `tbl_detail_obat_proses`.`id` = ? ";

        return $this->db->query($sql, [$id]);
    }

    public function newStok($where)
    {
        $this->db->select_sum('jml_obat');
        $this->db->where($where);
        return $this->db->get($this->view);
    }
}
