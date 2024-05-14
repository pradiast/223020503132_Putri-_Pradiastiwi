<?php
    // Sertakan file koneksi ke database di sini
    require("connection/connection.php");

    // Proses form saat tombol submit ditekan
    if(isset($_POST['submit'])){
        // Tangkap data dari form
        $id_sepatu = $_POST["id_sepatu"];
        $merk_sepatu = $_POST["merk_sepatu"];
        $jenis_sepatu = $_POST["jenis_sepatu"];
        $ukuran = $_POST["ukuran"];
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];

        // Proses gambar yang diunggah
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $upload_dir = "image/"; // Direktori tempat menyimpan gambar
        move_uploaded_file($tmp_name, $upload_dir.$gambar);

        // Query untuk menambahkan data sepatu ke dalam database
        $query = "INSERT INTO sepatu (id_sepatu, merk_sepatu, jenis_sepatu, ukuran, harga, stok, gambar) VALUES ('$id_sepatu', '$merk_sepatu', '$jenis_sepatu', '$ukuran', '$harga', '$stok', '$gambar')";

        // Jalankan query
        if(mysqli_query($conn, $query)){
            header("Location: index.blade.php"); // Redirect ke halaman utama setelah berhasil menambahkan data
        }else{
            echo "Tambah data gagal";
        }
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sepatu</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 10px;
    }

    h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    input[type="text"],
    button {
        width: 90%;
        padding: 8px;
        margin: 8px 0;
        border: none;
        border-radius: 5px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    @media screen and (max-width: 600px) {
        .container {
            flex-direction: column;
        }
    }
    </style>

</head>
<body>
    <center>
    <h1>Tambah Data Sepatu</h1>

    <!-- Formulir untuk menambahkan data sepatu -->
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="id_sepatu">ID Sepatu:</label><br>
        <input type="text" id="id_sepatu" name="id_sepatu" required><br>

        <label for="merk_sepatu">Merk Sepatu:</label><br>
        <input type="text" id="merk_sepatu" name="merk_sepatu" required><br>

        <label for="jenis_sepatu">Jenis Sepatu:</label><br>
        <input type="text" id="jenis_sepatu" name="jenis_sepatu" required><br>

        <label for="ukuran">Ukuran:</label><br>
        <input type="text" id="ukuran" name="ukuran" required><br>

        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga" required><br>

        <label for="stok">Stok:</label><br>
        <input type="text" id="stok" name="stok" required><br>

        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar" accept="image/*" required><br>
        <br>
        <button type="submit" name="submit">Tambahkan</button>
    </form>
</body>
</html>
