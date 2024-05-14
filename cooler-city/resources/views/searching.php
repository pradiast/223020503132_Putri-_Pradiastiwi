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
    $merknya = mysqli_real_escape_string($conn, $_POST["query"]);
    // $query = "CALL SearchNama ('$namanya')";
    $query = "SELECT * FROM sepatu WHERE sepatu.merk_sepatu LIKE '%" .$merknya. "%'";
$result = mysqli_query($conn, $query);

if ($result) {
    $output .= '
    <table class="table table-bordered" >
       <tr align = "center">
        <th>ID Sepatu</th>
        <th>Merk</th>
        <th>Jenis Sepatu/Hp</th>
        <th>Ukuran</th>
        <th>Harga</th>
        <th>Stok</th>
       </tr>
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr align = "center">
            <td>'.$row["id_sepatu"].'</td>
            <td>'.$row["merk_sepatu"].'</td>
            <td>'.$row["jenis_sepatu"].'</td>
            <td>'.$row["ukuran"].'</td>
            <td>'.$row["harga"].'</td>
            <td>'.$row["stok"].'</td>
        </tr>
        ';
     }
     echo $output;
   } else {
      echo "Masukan yang ingin dicari";
   }
}
?>
