<?php
    // Sertakan file koneksi ke database di sini
    require("connection/connection.php");

    // Ambil data dari form
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    // Insert data ke database
    $sql = "INSERT INTO pelanggan (id_pelanggan, nama, telepon) VALUES ('$id_pelanggan', '$nama', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "Pelanggan berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
?>
