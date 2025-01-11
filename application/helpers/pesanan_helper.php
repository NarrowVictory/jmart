<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('generate_nomor_pesanan')) {
    /**
     * Generate nomor pesanan otomatis berdasarkan tanggal, bulan, tahun, dan nomor urut.
     *
     * @return string Nomor pesanan yang dihasilkan.
     */
    function generate_nomor_pesanan()
    {
        // Instance CI untuk akses ke framework
        $CI = &get_instance();

        // Load database library
        $CI->load->database();

        // Ambil tanggal, bulan, dan tahun saat ini
        $tanggal = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tahun_nilai = date('y');

        // Query untuk menghitung jumlah transaksi pada hari tersebut
        $CI->db->select('COUNT(id_pesanan ) as jumlah_transaksi');
        $CI->db->where('DAY(tgl_pesanan)', $tanggal);
        $CI->db->where('MONTH(tgl_pesanan)', $bulan);
        $CI->db->where('YEAR(tgl_pesanan)', $tahun);
        $query = $CI->db->get('tb_pesanan');

        // Ambil hasil query
        $result = $query->row_array();
        $jumlah_transaksi = isset($result['jumlah_transaksi']) ? $result['jumlah_transaksi'] : 0;

        // Format nomor urut dengan padding nol di depan
        $nomor_urut = str_pad($jumlah_transaksi + 1, 4, '0', STR_PAD_LEFT);

        // Gabungkan tanggal, bulan, tahun, dan nomor urut
        $nomor_pesanan = $tanggal . $bulan . $tahun_nilai . $nomor_urut;

        return $nomor_pesanan;
    }
}
