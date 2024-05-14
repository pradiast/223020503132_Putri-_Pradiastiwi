

<?php
    // Sertakan file koneksi ke database di sini
    require("connection/connection.php");

    // Ambil data dari form
    $id_transaksi = $_POST['id_transaksi'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_sepatu = $_POST['id_sepatu'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    // Insert data ke database
    $sql = "INSERT INTO transaksi (id_transaksi, id_pelanggan, id_sepatu, jumlah, total_harga, tanggal_pembelian) VALUES ('$id_transaksi', '$id_pelanggan', '$id_sepatu', '$jumlah', '$total_harga', '$tanggal_pembelian')";

    if ($conn->query($sql) === TRUE) {
        // echo "Transaksi berhasil ditambahkan";
        header("Location: transaksi.blade.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
?>
