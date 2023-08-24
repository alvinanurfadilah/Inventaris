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

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->tbl);
        return (($this->db->affected_rows() > 0) ? true : false);
    }

    //untuk menampilkan data obat yang overall stock nya < 5
    public function getStok()
    {
        $query = "SELECT * FROM tbl_obat WHERE overall_stock < 5";

        return $this->db->query($query);
    }

    public function record()
    {
        $sql = "SELECT COUNT(*) AS jmlRecord FROM tbl_obat";

        return $this->db->query($sql)->row_array();
    }

    // dashboard
    public function masuk()
    {
        return $this->db->query("SELECT sum(tbl_detail_obat.stock_history) AS jumlah
        FROM tbl_detail_obat_proses
        JOIN tbl_detail_obat ON tbl_detail_obat.id = tbl_detail_obat_proses.detail_obat_id
        JOIN tbl_obat_proses ON tbl_obat_proses.id = tbl_detail_obat_proses.obat_proses_id
        JOIN tbl_obat ON tbl_obat.id = tbl_detail_obat.obat_id
        WHERE tbl_detail_obat_proses.jml_obat IS NULL
        AND DATE_FORMAT(tbl_obat_proses.tanggal, '%m/%Y') = DATE_FORMAT(NOW(), '%m/%Y')")->row_array();
    }

    //table dashboard
    public function masukStok()
    {
        return $this->db->query("SELECT tbl_detail_obat.obat_id, tbl_obat.name, sum(tbl_detail_obat.stock_history) AS jumlah
        FROM tbl_detail_obat_proses
        JOIN tbl_detail_obat ON tbl_detail_obat.id = tbl_detail_obat_proses.detail_obat_id
        JOIN tbl_obat_proses ON tbl_obat_proses.id = tbl_detail_obat_proses.obat_proses_id
        JOIN tbl_obat ON tbl_obat.id = tbl_detail_obat.obat_id
        WHERE tbl_detail_obat_proses.jml_obat IS NULL
        AND DATE_FORMAT(tbl_obat_proses.tanggal, '%m/%Y') = DATE_FORMAT(NOW(), '%m/%Y')
        GROUP BY tbl_detail_obat.obat_id")->result_array();
    }

    //dashboard
    public function keluar()
    {
        return $this->db->query("SELECT SUM(tbl_detail_obat_proses.jml_obat) AS jumlah
        FROM tbl_detail_obat_proses
        JOIN tbl_detail_obat ON tbl_detail_obat.id = tbl_detail_obat_proses.detail_obat_id
        JOIN tbl_obat_proses ON tbl_obat_proses.id = tbl_detail_obat_proses.obat_proses_id
        JOIN tbl_obat ON tbl_obat.id = tbl_detail_obat.obat_id
        AND DATE_FORMAT(tbl_obat_proses.tanggal, '%m/%Y') = DATE_FORMAT(NOW(), '%m/%Y')")->row_array();
    }

    //table dashboard
    public function keluarStok()
    {
        return $this->db->query("SELECT tbl_detail_obat.obat_id, tbl_obat.name, sum(tbl_detail_obat_proses.jml_obat) AS jumlah
        FROM tbl_detail_obat_proses
        JOIN tbl_detail_obat ON tbl_detail_obat.id = tbl_detail_obat_proses.detail_obat_id
        JOIN tbl_obat_proses ON tbl_obat_proses.id = tbl_detail_obat_proses.obat_proses_id
        JOIN tbl_obat ON tbl_obat.id = tbl_detail_obat.obat_id
        WHERE DATE_FORMAT(tbl_obat_proses.tanggal, '%m/%Y') = DATE_FORMAT(NOW(), '%m/%Y')
        GROUP BY tbl_detail_obat.obat_id")->result_array();
    }

    public function isExist($input)
    {
        $query = $this->db->get_where('tbl_obat', ['name' => $input]);
        return $query->num_rows() > 0;
    }
}
