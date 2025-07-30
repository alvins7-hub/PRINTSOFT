<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";

// mengecek data GET "id"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol hapus
    $id = $mysqli->real_escape_string(trim($_GET['id']));

    // // mengecek data foto profil
    // // sql statement untuk menampilkan data "foto_profil" dari tabel "produk" berdasarkan "id"
    // $query = $mysqli->query("SELECT foto_profil FROM produk WHERE id='$id'")
    //                          or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // // ambil data hasil query
    // $data = $query->fetch_assoc();

    // // hapus file foto dari folder images
    // $hapus_file = unlink("images/$data[foto_profil]");

    // sql statement untuk delete data dari tabel "produk" berdasarkan "id"
    $delete = $mysqli->query("DELETE FROM produk WHERE id='$id'")
                              or die('Ada kesalahan pada query delete : ' . $mysqli->error);
    // cek query
    // jika proses delete berhasil
    if ($delete) {
        // alihkan ke halaman data siswa dan tampilkan pesan berhasil hapus data
        header('location: index.php?halaman=data&pesan=3');
    }
}
