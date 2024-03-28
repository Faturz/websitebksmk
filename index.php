<?php
$host = "localhost";
$username = "root";
$password = "htmlyu";
$database = "data_siswa";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        
        session_start();
        $_SESSION["username"] = $username;
        header("Location: ../admin/home.php"); //
    } else {
        
        echo htmlspecialchars("Login gagal. Silakan coba lagi.", ENT_QUOTES, 'UTF-8');
    }

    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="web icon" type="icon" href="../assets/image/logo.png">
    <link rel="stylesheet" href="../styles/login.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
</head>
<body>
  <div class="header">
    <div class="titleHead">
      <h2>Website Bimbingan Konseling</h2>
      <h3>SMKN 1 Rangkasbitung</h3>
    </div>
    <div class="logoHead">
      <img src="/assets/image/logo.png" alt="logo smk">
    </div>
  </div>
    <div class="content">
      <div class="title">
        <h3>Selamat Datang!</h3>
        <p>Verifikasi bahwa kamu adalah admin</p>
      </div>
      <div class="form">
        <form action="../admin/admin.html" method="post">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Username Admin" required>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Password Admin" required>
          <button class="loginBtn" type="submit">Masuk</button>
        </form>
      </div>
    </div>
</body>
</html>