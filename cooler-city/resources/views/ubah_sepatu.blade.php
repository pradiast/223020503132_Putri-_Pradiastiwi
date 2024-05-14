<?php
    require("connection/connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_sepatu = mysqli_real_escape_string($conn, $_POST["id_sepatu"]);
        $merk_sepatu = mysqli_real_escape_string($conn, $_POST["merk_sepatu"]);
        $jenis_sepatu = mysqli_real_escape_string($conn, $_POST["jenis_sepatu"]);
        $ukuran = mysqli_real_escape_string($conn, $_POST["ukuran"]);
        $harga = mysqli_real_escape_string($conn, $_POST["harga"]);
        $stok = mysqli_real_escape_string($conn, $_POST["stok"]);

        // Proses gambar yang diunggah
        $lokasi_file = $_FILES['gambar']['tmp_name'];
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_gambar = $_FILES['gambar']['size'];

        if ($ukuran_gambar > 0 && $ukuran_gambar <= 5242880) {
            move_uploaded_file($lokasi_file, 'image/' . $nama_file);
            $query = "UPDATE sepatu SET merk_sepatu='$merk_sepatu', jenis_sepatu='$jenis_sepatu', ukuran='$ukuran', harga='$harga', stok='$stok', gambar='$nama_file' WHERE id_sepatu='$id_sepatu'";
        } elseif ($ukuran_gambar > 5242880) {
            echo "<script>alert('Ukuran foto $nama_file lebih dari 5 MB, tidak dapat menambahkan data'); window.location='ubah_sepatu.php'</script>";
            exit;
        } else {
            $query = "UPDATE sepatu SET merk_sepatu='$merk_sepatu', jenis_sepatu='$jenis_sepatu', ukuran='$ukuran', harga='$harga', stok='$stok' WHERE id_sepatu='$id_sepatu'";
        }

        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            header("location: index.blade.php");
            exit;
        }
    }

    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $sepatu_query = "SELECT * FROM sepatu WHERE id_sepatu = '$id'";
    $result = mysqli_query($conn, $sepatu_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Sepatu</title>
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
        padding: 5px;
        margin: 4px 0;
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

    @media screen and (max-width: 400px) {
        .container {
            flex-direction: column;
        }
    }
    </style>
</head>
<body>
    <center>
    <h1>Ubah Data Sepatu</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php while ($data = mysqli_fetch_assoc($result)): ?>
        <label for="id_sepatu">ID Sepatu:</label><br>
        <input type="text" id="id_sepatu" name="id_sepatu" value="<?php echo $data["id_sepatu"]; ?>" readonly><br>

        <label for="merk_sepatu">Merk:</label><br>
        <input type="text" id="merk_sepatu" name="merk_sepatu" value="<?php echo $data["merk_sepatu"]; ?>"><br>

        <label for="jenis_sepatu">Jenis Sepatu:</label><br>
        <input type="text" id="jenis_sepatu" name="jenis_sepatu" value="<?php echo $data["jenis_sepatu"]; ?>"><br>

        <label for="ukuran">Ukuran:</label><br>
        <input type="text" id="ukuran" name="ukuran" value="<?php echo $data["ukuran"]; ?>"><br>

        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga" value="<?php echo $data["harga"]; ?>"><br>

        <label for="stok">Stok:</label><br>
        <input type="text" id="stok" name="stok" value="<?php echo $data["stok"]; ?>"><br>

        <label for="gambar">Gambar:</label><br>
        <p><img src ="image/<?php echo $data["gambar"]; ?> "width="100" height="auto"></p>

        <input type="file" id="gambar" name="gambar" accept=".jpeg,.jpg,.png"><br>
        <br>
        <?php endwhile; ?>
        <button type="submit" name="submit">Perbarui</button>
    </form>
</body>
</html>
