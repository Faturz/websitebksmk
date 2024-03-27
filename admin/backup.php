<?php

    include('admin.php');

// // Koneksi ke database (ganti dengan informasi koneksi sesuai dengan database Anda)
// $servername = "localhost";
// $username = "root";
// $password = "htmlyu";
// $database = "data_siswa";

// // Membuat koneksi
// $conn = new mysqli($servername, $username, $password, $database);

// // Memeriksa koneksi
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// }

// // Memeriksa apakah parameter delete_id telah diberikan
// if(isset($_GET['delete_id'])) {
//     $delete_id = $_GET['delete_id'];

//     // Menyiapkan query SQL untuk menghapus data siswa berdasarkan id
//     $sql = "DELETE FROM karir_siswa WHERE id='$delete_id'";

//     // Menjalankan query dan memeriksa apakah penghapusan berhasil
//     if ($conn->query($sql) === TRUE) {
//         echo "<script>alert('Data berhasil dihapus.');</script>";
//     } else {
//         echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
//     }
// }

// // Memeriksa apakah terdapat parameter pencarian
// if(isset($_GET['keyword'])) {
//     $keyword = $_GET['keyword'];

//     // Menyiapkan query SQL untuk mencari data berdasarkan nama siswa
//     $sql = "SELECT * FROM karir_siswa WHERE nama_siswa LIKE '%$keyword%'";
//     $result = $conn->query($sql);
// } else {
//     // Jika tidak ada pencarian, ambil semua data
//     $sql = "SELECT * FROM karir_siswa";
//     $result = $conn->query($sql);
// }
?>
<body>
    <div class="container">
        <h2>Data Perencanaan Karir Siswa</h2>
        <form method="GET" action="">
            <input type="text" name="keyword" placeholder="Cari berdasarkan nama siswa...">
            <button type="submit">Cari</button>
        </form>
        <?php
        // Memeriksa apakah ada data yang ditemukan
        if ($result->num_rows > 0) {
            // Menampilkan data ke dalam tabel
            echo "<table>";
            echo "<tr>";
            echo "<th>No</th>";
            echo "<th>Nama Siswa</th>";
            echo "<th>Perencanaan Karir</th>";
            echo "<th class='action-column'>Aksi</th>";
            echo "</tr>";
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row["nama_siswa"] . "</td>";
                echo "<td>" . $row["perencanaan_karir"] . "</td>";
                echo "<td class='action-column'>";
                echo "<a href='edit_karir.php?id=" . $row["id"] . "' class='edit-link'>Edit</a>";
                echo "<a href='?delete_id=" . $row["id"] . "' class='delete-link' onclick='return confirmDelete()'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data</p>";
        }
        ?>
    </div>

    <!-- JavaScript untuk konfirmasi penghapusan -->
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</body>
</html>

<?php
// Menutup koneksi ke database
$conn->close();
?>
