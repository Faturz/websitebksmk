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
        <div class="headProfile">
            <div class="textProfile">
                <h2>Data Perencanaan Karir Siswa</h2>
            </div>
            <div class="formProfile">
                <form method="GET" action="">
                    <input type="text" name="keyword" placeholder="Cari berdasarkan nama siswa...">
                    <button type="submit">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="tableSiswa" style="overflow-x: auto;">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Perencanaan Karir</th>
                    <th class='action-column'>Aksi</th>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Nama Siswa</td>
                        <td>Karir Siswa</td>
                        <td class='action-column'>
                                <button class="editBtn">
                                    <a href='../crud/edit/edit_karir.php?id=" . $row["id"] . "'>
                                        <i class='bx bx-edit' ></i>
                                    </a>";
                                </button>
                                <button class="deleteBtn">
                                    <a href='?delete_id=" . $row["id"] . "' onclick='return confirmDelete()'>
                                        <i class='bx bx-trash' ></i>
                                    </a>";
                                </button>
                    </td>
                </tr>
            </table>
        </div>
        <p>Tidak ada data</p>
    </div>

    <!-- JavaScript untuk konfirmasi penghapusan -->
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</body>
</html>
