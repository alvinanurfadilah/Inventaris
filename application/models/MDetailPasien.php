<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDetailPasien extends CI_Model
{
    private $tbl = 'tbl_detail_pasien';
    private $view = 'v_detail_pasien';

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

    public function getKeluar()
    {
        $sql = "SELECT tbl_detail_obat_proses.id, tbl_detail_obat_proses.jml_obat, tbl_detail_obat_proses.detail_obat_id, tbl_detail_obat.obat_id, tbl_obat.name, tbl_detail_obat_proses.obat_proses_id, tbl_obat_proses.tanggal, tbl_obat_proses.user_id, tbl_obat_proses.detail_pasien_id, tbl_detail_pasien.pasien_id, tbl_detail_pasien.tanggal_berobat, tbl_detail_pasien.ket, tbl_pasien.first_name, tbl_pasien.last_name
        FROM tbl_detail_obat_proses
        JOIN tbl_detail_obat ON tbl_detail_obat.id = tbl_detail_obat_proses.detail_obat_id
        JOIN tbl_obat ON tbl_obat.id = tbl_detail_obat.obat_id
        JOIN tbl_obat_proses ON tbl_obat_proses.id = tbl_detail_obat_proses.obat_proses_id
        JOIN tbl_detail_pasien ON tbl_detail_pasien.id = tbl_obat_proses.detail_pasien_id
        JOIN tbl_pasien ON tbl_pasien.id = tbl_detail_pasien.pasien_id
        WHERE tbl_obat_proses.kategori_id = 2
        ORDER BY tbl_detail_pasien.id";

        return $this->db->query($sql);
    }

    public function getPasien()
    {
        $query = "SELECT DISTINCT `tbl_detail_pasien`.`pasien_id`, `tbl_pasien`.`first_name`, `tbl_pasien`.`last_name`
        FROM `tbl_detail_pasien`
        JOIN `tbl_pasien` ON `tbl_pasien`.`id` = `tbl_detail_pasien`.`pasien_id`";

        return $this->db->query($query);
    }
}
