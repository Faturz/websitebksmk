<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Perencanaan Karir Siswa</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
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
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Perencanaan Karir Siswa</h2>

        <?php
        // Koneksi ke database (ganti dengan informasi koneksi sesuai dengan database Anda)
        $servername = "localhost";
        $username = "root";
        $password = "htmlyu";
        $database = "data_siswa";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $database);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Memeriksa apakah parameter id telah diberikan
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            // Menyiapkan query SQL untuk mengambil data siswa berdasarkan id
            $sql = "SELECT * FROM karir_siswa WHERE id='$id'";
            $result = $conn->query($sql);

            // Memeriksa apakah data ditemukan
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Menampilkan formulir untuk mengedit data
                echo "<form action='update_karir.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";

                echo "<label for='nama'>Nama Siswa:</label>";
                echo "<input type='text' id='nama' name='nama' value='" . $row["nama_siswa"] . "' required>";

                echo "<label for='perencanaan'>Perencanaan Karir:</label>";
                echo "<select id='perencanaan' name='perencanaan' required>";
                echo "<option value=''>Pilih Perencanaan Karir</option>";
                echo "<option value='wirausaha' " . ($row["perencanaan_karir"] == 'wirausaha' ? 'selected' : '') . ">Wirausaha</option>";
                echo "<option value='bekerja' " . ($row["perencanaan_karir"] == 'bekerja' ? 'selected' : '') . ">Bekerja</option>";
                echo "<option value='melanjutkan kuliah' " . ($row["perencanaan_karir"] == 'melanjutkan kuliah' ? 'selected' : '') . ">Melanjutkan Kuliah</option>";
                echo "</select>";

                echo "<input type='submit' value='Simpan Perubahan'>";
                echo "</form>";
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "Parameter id tidak diberikan.";
        }

        // Menutup koneksi ke database
        $conn->close();
        ?>

    </div>
</body>
</html>
