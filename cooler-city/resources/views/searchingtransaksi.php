<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coolercity";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$output = '';
if (isset($_POST["query"])) {
    $namanya = mysqli_real_escape_string($conn, $_POST["query"]);
    // $query = "CALL SearchNama ('$namanya')";
    $query = "SELECT p.nama, p.telepon, s.merk_sepatu, s.jenis_sepatu, s.ukuran, s.gambar, t.id_transaksi, t.jumlah, t.total_harga, t.tanggal_pembelian
    FROM pelanggan p
    INNER JOIN transaksi t ON t.id_pelanggan = p.id_pelanggan
    INNER JOIN sepatu s ON s.id_sepatu = t.id_sepatu
    WHERE p.nama LIKE '%" .$namanya. "%'";
$result = mysqli_query($conn, $query);

if ($result) {
    $output .= '
    <table class="table table-bordered" >
       <tr align = "center">


          <th>Nama</th>
            <th>Telepon</th>
            <th>Merk Sepatu</th>
            <th>Jenis Sepatu</th>
            <th>Ukuran</th>
            <th>Gambar</th>
            <th>Jumlah Beli</th>
            <th>Total Harga</th>
            <th>Tanggal Pembelian</th>
       </tr>
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr align = "center">
           <td>'.$row["nama"].'</td>
           <td>'.$row["telepon"].'</td>
           <td>'.$row["merk_sepatu"].'</td>
           <td>'.$row["jenis_sepatu"].'</td>
           <td>'.$row["ukuran"].'</td>
           <td><img src="image/'.$row["gambar"].'" alt="Sepatu" style="width:100px;height:100px;"></td>
           <td>'.$row["jumlah"].'</td>
           <td>'.$row["total_harga"].'</td>
           <td>'.$row["tanggal_pembelian"].'</td>
        </tr>
        ';
     }
     echo $output;
   } else {
      echo "Masukan yang ingin dicari";
   }
}
?>
