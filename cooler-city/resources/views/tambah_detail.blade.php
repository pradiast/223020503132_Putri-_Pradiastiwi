<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sepatu</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>
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

    <!-- Formulir untuk menambahkan data pelanggan -->
    <form action="tambah_pelanggan.blade.php" method="POST" enctype="multipart/form-data">
        <label for="id_pelanggan">ID Pelanggan:</label><br>
        <input type="text" id="id_pelanggan" name="id_pelanggan" required><br>

        <label for="nama">Nama Pelanggan:</label><br>
        <input type="text" id="nama" name="nama" required><br>

        <label for="telepon">No Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" required><br>

        <button type="submit" value="Tambah Pelanggan">Tambahkan</button>
    </form>

    <!-- Formulir untuk menambahkan data transaksi -->
    <form action="tambah_transaksi.blade.php" method="POST" enctype="multipart/form-data">
        <label for="id_transaksi">ID Transaksi:</label><br>
        <input type="text" id="id_transaksi" name="id_transaksi" required><br>

        <label for="id_pelanggan">ID Pelanggan:</label><br>
        <input type="text" id="id_pelanggan" name="id_pelanggan" required><br>

        <label for="id_sepatu">ID Sepatu:</label><br>
        <input type="text" id="id_sepatu" name="id_sepatu" required><br>

        <label for="jumlah">Jumlah Beli:</label><br>
        <input type="text" id="jumlah" name="jumlah" required><br>

        <label for="total_harga">Total Harga:</label><br>
        <input type="text" id="total_harga" name="total_harga" required><br>

        <label for="tanggal_pembelian">Tanggal Pembelian:</label><br>
        <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" required><br>

        <button type="submit" value="Tambah Transaksi">Tambahkan</button>
    </form>
</body>
</html>
