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

    // login
    error_reporting(0);
    session_start();
    if (isset($_SESSION['nama'])) {
        header("Location: index.blade.php");
    }

    if (isset($_POST['submit'])) {
        $username_ = $_POST['username_'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM user WHERE username_ = '".$username_."' AND pass = '".$pass."'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nama'] = $row['nama'];
            echo "
			    <script>
				    alert('Selamat Datang ".$_SESSION['nama']."');
				    document.location.href = 'index.blade.php';
                </script>
		    ";
        } else {
            echo "
                <script>
                    alert('Login Gagal, Username atau Password Salah!')
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
    <title>Login</title>
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
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username_" name="username_" value="<?php echo $username_; ?>"required>
        <label for="password">Password:</label>
        <input type="password" id="pass" name="pass" value="<?php echo $username_; ?>" required>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
