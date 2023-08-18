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

    public function getDetail($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // public function getObat()
    // {
    //     $query = "SELECT `tbl_detail_obat`.`id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_detail_obat`.`stock`, `tbl_detail_obat`.`expired`
    //     FROM `tbl_detail_obat`
    //     JOIN `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`";

    //     return $this->db->query($query);
    // }

    public function getObat()
    {
        $query = "SELECT DISTINCT `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`
        FROM `tbl_detail_obat`
        JOIN `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`";

        return $this->db->query($query);
    }

    public function getStock($obat_id)
    {
        $query = "SELECT `tbl_detail_obat`.`id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_detail_obat`.`stock`, `tbl_detail_obat`.`expired`
        FROM `tbl_detail_obat`
        JOIN `tbl_obat` on `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`
        WHERE `tbl_detail_obat`.`stock` > 0 AND `tbl_detail_obat`.`expired` > CURRENT_TIME AND `tbl_detail_obat`.`obat_id` = $obat_id
        ORDER BY `tbl_detail_obat`.`expired`";

        return $this->db->query($query);
    }
}
