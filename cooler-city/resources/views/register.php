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

    error_reporting(0);
    session_start();
    session_destroy();
    if (isset($_SESSION['nama'])) {
    header("Location: register.php");
    }

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $username_ = $_POST['username_'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        if ($password_ == $cpassword_) {
            $query = "SELECT * FROM user WHERE username_='$username_'";
            $result = mysqli_query($conn, $query);
            if (!$result->num_rows > 0) {
                $query = "INSERT INTO user (nama, username_, pass) VALUES ('$nama', '$username_', '$pass')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "
                        <script>
                            alert('Registrasi Berhasil')
                            document.location.href = 'index.blade.php';
                        </script>
                    ";
                    $nama = "";
                    $username_ = "";
                    $_POST['pass'] = "";
                    $_POST['cpass'] = "";
                } else {
                    echo "
                        <script>
                            alert('Woops! Terjadi kesalahan.')
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Woops! Username Sudah Terdaftar.')
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Password_ Tidak Sesuai')
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Register</h2>
        <label for="username">Username:</label>
        <input type="text" id="username_" name="username_" value="<?php echo $username_; ?>" required>

        <label for="password">Password:</label>
        <input type="password" id="passpassword" name="pass" value="<?php echo $_POST['pass']; ?>" required>

        <label for="password">Confirm Password:</label>
        <input type="password" id="cpass" name="cpass" value="<?php echo $_POST['cpass']; ?>" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
