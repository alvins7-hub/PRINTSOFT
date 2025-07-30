<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";

// mengecek data hasil submit dari form
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $id      = $mysqli->real_escape_string($_POST['id']);
    // $tanggal       = $mysqli->real_escape_string(trim($_POST['tanggal_daftar']));
    // $kelas         = $mysqli->real_escape_string($_POST['kelas']);
    $name  = $mysqli->real_escape_string(trim($_POST['nama']));
    $price  = $mysqli->real_escape_string(trim($_POST['harga']));
    $stock  = $mysqli->real_escape_string(trim($_POST['stock']));
    $formula = $mysqli->real_escape_string($_POST['formula']);
    // $alamat        = $mysqli->real_escape_string(trim($_POST['alamat']));
    // $email         = $mysqli->real_escape_string(trim($_POST['email']));
    // $whatsapp      = $mysqli->real_escape_string(trim($_POST['whatsapp']));

    // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
    // $created_at = date('Y-m-d', strtotime($tanggal));

    // // ambil data file hasil submit dari form
    // $nama_file          = $_FILES['foto']['name'];
    // $tmp_file           = $_FILES['foto']['tmp_name'];
    // $extension          = array_pop(explode(".", $nama_file));
    // // enkripsi nama file
    // $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
    // // tentukan direktori penyimpanan file
    // $path               = "images/" . $nama_file_enkripsi;

    // lakukan proses unggah file
    // jika file berhasil diunggah
    // sql statement untuk insert data ke tabel "produk"
    $insert = $mysqli->query("INSERT INTO produk(id, name, price, stock, formula) 
                                VALUES('$id', '$name', '$price', '$stock', '$formula')")
                                or die('Ada kesalahan pada query insert : ' . $mysqli->error);
    // cek query
    // jika proses insert berhasil
    if ($insert) {
        // alihkan ke halaman data siswa dan tampilkan pesan berhasil simpan data
        header('location: index.php?halaman=data&pesan=1');
    }
    // if (move_uploaded_file($tmp_file, $path)) {
    //     // sql statement untuk insert data ke tabel "produk"
    //     $insert = $mysqli->query("INSERT INTO produk(id, name, price, stock, formula) 
    //                               VALUES('$id', '$name', '$price', '$stock', '$formula')")
    //                               or die('Ada kesalahan pada query insert : ' . $mysqli->error);
    //     // cek query
    //     // jika proses insert berhasil
    //     if ($insert) {
    //         // alihkan ke halaman data siswa dan tampilkan pesan berhasil simpan data
    //         header('location: index.php?halaman=data&pesan=1');
    //     }
    // }
}
