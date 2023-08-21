<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MObatProses extends CI_Model
{
    private $tbl = 'tbl_obat_proses';
    private $view = 'v_obat_proses';

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

    //untuk menampilkan laporan masuk
    public function getMasuk()
    {
        $query = "SELECT `tbl_detail_obat_proses`.`id`, `tbl_detail_obat_proses`.`detail_obat_id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_detail_obat`.`stock_history`, `tbl_detail_obat`.`expired`, `tbl_detail_obat_proses`.`obat_proses_id`, `tbl_obat_proses`.`tanggal`, `tbl_obat_proses`.`kategori_id`
        FROM `tbl_detail_obat_proses`
        JOIN `tbl_detail_obat` ON `tbl_detail_obat`.`id` = `tbl_detail_obat_proses`.`detail_obat_id`
        JOIN `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`
        JOIN `tbl_obat_proses` ON `tbl_obat_proses`.`id` = `tbl_detail_obat_proses`.`obat_proses_id`
        WHERE `tbl_obat_proses`.`kategori_id` = 1
        ORDER BY `tbl_obat_proses`.`tanggal`";

        return $this->db->query($query);
    }

    public function getMasukTgl($start_date, $end_date)
    {
        $query = "SELECT `tbl_detail_obat_proses`.`id`, `tbl_detail_obat_proses`.`detail_obat_id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_detail_obat`.`stock_history`, `tbl_detail_obat`.`expired`, `tbl_detail_obat_proses`.`obat_proses_id`, `tbl_obat_proses`.`tanggal`, `tbl_obat_proses`.`kategori_id`
        FROM `tbl_detail_obat_proses`
        JOIN `tbl_detail_obat` ON `tbl_detail_obat`.`id` = `tbl_detail_obat_proses`.`detail_obat_id`
        JOIN `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`
        JOIN `tbl_obat_proses` ON `tbl_obat_proses`.`id` = `tbl_detail_obat_proses`.`obat_proses_id`
        WHERE `tbl_obat_proses`.`kategori_id` = 1 AND `tbl_obat_proses`.`tanggal` BETWEEN '$start_date' AND '$end_date'
        ORDER BY `tbl_obat_proses`.`tanggal`";

        return $this->db->query($query);
    }

    public function getKeluar()
    {
        $query = "SELECT `tbl_detail_obat_proses`.`id`, `tbl_detail_obat_proses`.`jml_obat`, `tbl_detail_obat_proses`.`detail_obat_id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_detail_obat_proses`.`obat_proses_id`, `tbl_obat_proses`.`tanggal`, `tbl_obat_proses`.`kategori_id`
        FROM `tbl_detail_obat_proses`
        JOIN `tbl_detail_obat` ON `tbl_detail_obat`.`id` = `tbl_detail_obat_proses`.`detail_obat_id`
        JOIN `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`
        JOIN `tbl_obat_proses` ON `tbl_obat_proses`.`id` = `tbl_detail_obat_proses`.`obat_proses_id`
        WHERE `tbl_obat_proses`.`kategori_id` = 2
        ORDER BY `tbl_obat_proses`.`tanggal`";

        return $this->db->query($query);
    }

    public function getKeluarTgl($start_date, $end_date)
    {
        $query = "SELECT `tbl_detail_obat_proses`.`id`, `tbl_detail_obat_proses`.`jml_obat`, `tbl_detail_obat_proses`.`detail_obat_id`, `tbl_detail_obat`.`obat_id`, `tbl_obat`.`name`, `tbl_detail_obat_proses`.`obat_proses_id`, `tbl_obat_proses`.`tanggal`, `tbl_obat_proses`.`kategori_id`
        FROM `tbl_detail_obat_proses`
        JOIN `tbl_detail_obat` ON `tbl_detail_obat`.`id` = `tbl_detail_obat_proses`.`detail_obat_id`
        JOIN `tbl_obat` ON `tbl_obat`.`id` = `tbl_detail_obat`.`obat_id`
        JOIN `tbl_obat_proses` ON `tbl_obat_proses`.`id` = `tbl_detail_obat_proses`.`obat_proses_id`
        WHERE `tbl_obat_proses`.`kategori_id` = 2 AND `tbl_obat_proses`.`tanggal` BETWEEN '$start_date' AND '$end_date'
        ORDER BY `tbl_obat_proses`.`tanggal`";

        return $this->db->query($query);
    }
}
