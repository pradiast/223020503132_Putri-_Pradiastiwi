
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLERCITY STORE</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: separate; /* Menggunakan garis pemisah antar kolom */
            border-spacing: 0; /* Jarak antar garis pemisah */
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd; /* Menambahkan garis pemisah antar kolom */
        }

        th {
            background-color: #f2f2f2;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            border-right: none; /* Hapus garis pemisah untuk kolom terakhir */
        }

        td {
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        button {
            padding: 15px 25px;
            background-color: #9fc8f3;
            color: #fff;
            border: none;
            border-radius: 19px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff1ba8;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>COOLERCITY STORE</h1>

        <div style="float: right;">
            <a href="transaksi.blade.php"><button>Kembali</button></a>
        </div>
        <div style="float: left;">
            <input type="text" name="search_text" id="search_text" placeholder="Nama Pelanggan..." class="search">
        </div>
        <div class="table-responsive" id="result"></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
               load_data();
               function load_data(query){
                    $.ajax({
                         url: "searchingtransaksi.php",
                         method: "POST",
                         data:{
                              query: query
                         },
                         success: function(data) {
                              $('#result').html(data);
                         }
                    });
               }
               $('#search_text').keyup(function() {
                    var search = $(this).val();
                    if (search != '') {
                         load_data(search);
                    } else {
                         load_data();
                    }
               });
          });
</script>
