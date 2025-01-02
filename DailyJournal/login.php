<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];

  //menggunakan fungsi enkripsi md5 supaya sama dengan password yang tersimpan di database
  $password = md5($_POST['password']);

  //prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

  //parameter binding 
  $stmt->bind_param("ss", $username, $password); //username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
    //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

  //menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Daily Journal</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background-color: rgba(0, 123, 255, 0.2);
            border-radius: 50%;
            z-index: 0;
        }
        .container::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 150px;
            height: 150px;
            background-color: rgba(0, 123, 255, 0.2);
            border-radius: 50%;
            z-index: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            z-index: 1;
            position: relative;
        }
        .input-group {
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            background-color: rgba(255, 255, 255, 0.9);
            position: relative;
            transition: background-color 0.3s ease;
        }
        .input-group input:focus {
            outline: none;
            border-color: #007bff;
            background-color: #fff;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            z-index: 1;
            position: relative;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .text-center {
            text-align: center;
            margin-top: 20px;
            z-index: 1;
            position: relative;
        }
        .text-center a {
            text-decoration: none;
            color: #007bff;
        }
        .text-center a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to Daily Journal</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="text-center">
            <p>Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
</body>
</html>

<?php
}
?>
