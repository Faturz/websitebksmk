<?php
    include('admin.php')
?>
<div class="container">
    <div class="headProfile">
        <div class="textProfile">
            <h2>Data Siswa Berprestasi</h2>
        </div>
        <div class="formProfile">
            <form method="GET" action="">
                <input type="text" name="keyword" placeholder="Cari berdasarkan nama siswa...">
                <button type="submit">Cari</button>
            </div>
        </div>
    </form>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Prestasi</th>
                <th>Action</th>
            </tr>
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

// Query untuk pencarian
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM siswa_berprestasi";
if (!empty($keyword)) {
    $sql .= " WHERE nama_siswa LIKE '%$keyword%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data ke dalam tabel
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row['nama_siswa'] . "</td>";
        echo "<td>" . $row['prestasi'] . "</td>";
        echo "<td>
            <a href='edit_prestasi.php?id=" . $row['id'] . "' class='edit-link'>Edit</a> |
            <a href='?delete_id=" . $row['id'] . "' onclick='return confirmDelete()' class='delete-link'>Delete</a>
        </td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}
$conn->close();
?>

        </table>
    </div>

    <!-- JavaScript untuk konfirmasi penghapusan -->
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>

    <?php
    // Menghubungkan ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menghapus data jika delete_id tersedia
    if(isset($_GET['delete_id'])) {
        $id_to_delete = $_GET['delete_id'];
        $sql_delete = "DELETE FROM siswa_berprestasi WHERE id=$id_to_delete";
        if ($conn->query($sql_delete) === TRUE) {
            echo "<script>alert('Data berhasil dihapus.'); window.location.href='siswa_berprestasi.php';</script>";
            exit();
        } else {
            echo "<script>alert('Gagal menghapus data.');</script>";
        }
    }
    ?>
    </table>
    </div>
</body>
</html>
