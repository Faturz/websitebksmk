<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = "htmlyu"; // Ganti dengan password database Anda
$dbname = "data_siswa"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Check if ID parameter exists
if(isset($_GET['id'])) {
    // Retrieve the ID from the URL parameter
    $id = $_GET['id'];

    // Query to retrieve the data of the specific student with the given ID from the database
    $sql = "SELECT * FROM siswa_berprestasi WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the data
        $row = $result->fetch_assoc();
        $nama_siswa = $row['nama_siswa'];
        $prestasi = $row['prestasi'];
    } else {
        // If student with given ID does not exist, redirect user back to the main page or display an error message
        header("Location: siswa_berprestasi.php");
        exit();
    }
} else {
    // If ID parameter is not provided, redirect user back to the main page or display an error message
    header("Location: siswa_berprestasi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <!-- CSS styles -->
    <style>
        /* CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Header and navigation -->
    <!-- Navigation and header code here -->

    <div class="container">
        <h2>Edit Data Siswa</h2>
        <form action="update_prestasi.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden field to store ID for updating -->
            <label for="nama_siswa">Nama Siswa:</label>
            <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>"><br><br>
            
            <label for="prestasi">Prestasi:</label>
            <select id="prestasi" name="prestasi">
                <option value="Akademik" <?php if($prestasi == 'Akademik') echo 'selected'; ?>>Akademik</option>
                <option value="Non-Akademik" <?php if($prestasi == 'Non-Akademik') echo 'selected'; ?>>Non-Akademik</option>
            </select><br><br>
            
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
