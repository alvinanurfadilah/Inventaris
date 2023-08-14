<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MTampung extends CI_Model
{
    private $tbl = 'tbl_tampung';

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

    public function getObat()
    {
        $query = "SELECT `tbl_tampung`.`id`, `tbl_tampung`.`detail_obat_id`, `tbl_detail_obat`.`id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_tampung`.`jml_obat`
        FROM `tbl_tampung`
        JOIN `tbl_detail_obat` ON `tbl_detail_obat`.`id` = `tbl_tampung`.`detail_obat_id`
        join `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`";

        return $this->db->query($query);
    }
}
