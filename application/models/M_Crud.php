<?php

class M_Crud extends CI_model
{
    public function count($table)
    {
        return $this->db->select('*')->from($table)->count_all_results();
    }

    public function show($table, $where)
    {
        return $this->db->where($where)->get($table);
    }

    public function all_data($table)
    {
        return $this->db->select('*')->from($table);
    }

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function buat_id_pesanan($length)
    {
        $tanggal = date('Ymd'); // Format: Tanggal (Y-m-d)
        $waktu = date('His'); // Format: Waktu (H:i:s)
        $angka_acak = rand(100, 999); // Angka acak antara 100 dan 999

        // Gabungkan tanggal, waktu, dan angka acak untuk membentuk ID pesanan
        $id_pesanan = $tanggal . $waktu . $angka_acak;

        return $id_pesanan;
    }
}
