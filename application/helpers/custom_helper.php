<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('generate_transaction_number')) {
    function generate_transaction_number()
    {
        $CI = &get_instance();

        // Mendapatkan tahun saat ini
        $year = date('y');

        // Mendapatkan bulan saat ini
        $month = date('m');

        // Mendapatkan nomor transaksi terakhir dari database
        $last_transaction_number = $CI->db->select('id_pesanan')->order_by('id_pesanan', 'DESC')->limit(1)->get('tb_pesanan')->row('id_pesanan');

        // Jika tidak ada nomor transaksi sebelumnya, mulai dari 0001
        if (!$last_transaction_number) {
            $last_transaction_number = "0000";
        }

        // Ambil angka dari nomor transaksi terakhir
        $last_number = intval(substr($last_transaction_number, 7, 4));

        // Jika bulan dan tahun saat ini berbeda dengan bulan dan tahun nomor terakhir, reset nomor transaksi menjadi 0001
        if (substr($last_transaction_number, 3, 2) != $month || substr($last_transaction_number, 1, 2) != $year) {
            $last_number = 0;
        }

        // Tambahkan 1 ke nomor transaksi terakhir
        $new_number = str_pad($last_number + 1, 4, '0', STR_PAD_LEFT);

        // Format nomor transaksi sesuai dengan kebutuhan (misalnya INV-<tahun><bulan>-<nomor>)
        $transaction_number = "INV-$month$year-$new_number";

        return $transaction_number;
    }
}
