<?php
// Sertakan file koneksi ke database di sini
require("connection/connection.php");

// Pastikan parameter id_sepatu dikirimkan melalui URL
if(isset($_GET['id'])){
    // Tangkap id_sepatu dari URL
    $id_transaksi = $_GET['id'];

    // Query untuk menghapus data sepatu berdasarkan id_sepatu
    $query = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";

    // Jalankan query
    if(mysqli_query($conn, $query)){
        // Redirect ke halaman utama setelah berhasil menghapus data
        header("Location: transaksi.blade.php");
        exit();
    }else{
        echo "Hapus data gagal";
    }
}else{
    echo "ID Transaksi tidak ditemukan";
}

mysqli_close($conn);
?>
