<?php
    function limitsepatu()
    {
        global $conn;
        $query = "SELECT * FROM sepatu";
        $result = mysqli_query($conn, $query);
        $jumlah_data = mysqli_num_rows($result);

        return $jumlah_data;
    }

    function pagingsepatu($halaman_awal, $batas)
    {
        global $conn;
        $query = "SELECT * FROM sepatu ORDER BY merk_sepatu ASC LIMIT $halaman_awal, $batas ";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function limittransaksi()
    {
        global $conn;
        $query = "SELECT p.nama, p.telepon, s.merk_sepatu, s.jenis_sepatu, s.ukuran, s.gambar, t.id_transaksi, t.jumlah, t.total_harga, t.tanggal_pembelian
        FROM pelanggan p
        INNER JOIN transaksi t ON t.id_pelanggan = p.id_pelanggan
        INNER JOIN sepatu s ON s.id_sepatu = t.id_sepatu";
        $result = mysqli_query($conn, $query);
        $jumlah_data = mysqli_num_rows($result);

        return $jumlah_data;
    }

    function pagingtransaksi($halaman_awal, $batas)
    {
        global $conn;
        $query = "SELECT p.nama, p.telepon, s.merk_sepatu, s.jenis_sepatu, s.ukuran, s.gambar, t.id_transaksi, t.jumlah, t.total_harga, t.tanggal_pembelian
        FROM pelanggan p
        INNER JOIN transaksi t ON t.id_pelanggan = p.id_pelanggan
        INNER JOIN sepatu s ON s.id_sepatu = t.id_sepatu ORDER BY t.tanggal_pembelian ASC LIMIT $halaman_awal, $batas ";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
?>
