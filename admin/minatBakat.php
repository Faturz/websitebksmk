<?php
    include('admin.php')
?>


<div class="container">
    <div class="headProfile">
        <div class="textProfile">
            <h2>Data Minat dan Bakat Siswa</h2>
        </div>
        <div class="formProfile">
            <form method="GET" action="">
                <input type="text" name="keyword" placeholder="Cari berdasarkan nama siswa...">
                <button type="submit">Cari</button>
            </form>
        </div>
    </div>
    <div class="tableSiswa" style="overflow-x: auto;">
    <table>
        <tr>
            <th>Nama Siswa</th>
            <th>Hobi</th>
            <th>Cita-cita</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Konfigurasi database
        $host = 'localhost';
        $user = 'root'; // Ganti dengan username database Anda
        $password = 'htmlyu'; // Ganti dengan password database Anda
        $database = 'data_siswa'; // Ganti dengan nama database Anda

        // Koneksi ke database
        $conn = new mysqli($host, $user, $password, $database);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menghapus data jika delete_id tersedia
        if(isset($_GET['delete_id'])) {
            $id_to_delete = $_GET['delete_id'];
            $sql_delete = "DELETE FROM minat_bakat WHERE id=$id_to_delete";
            if ($conn->query($sql_delete) === TRUE) {
                echo "<script>alert('Data berhasil dihapus.'); window.location.href='minat&bakat.php';</script>";
                exit();
            } else {
                echo "<script>alert('Gagal menghapus data.');</script>";
            }
        }

        // Query untuk mengambil data dari database
        $sql = "SELECT * FROM minat_bakat";
        // Menambahkan kondisi pencarian berdasarkan keyword jika tersedia
        if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $sql .= " WHERE nama_siswa LIKE '%$keyword%'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nama_siswa"]. "</td>";
                echo "<td>" . $row["hobi"]. "</td>";
                echo "<td>" . $row["cita_cita"]. "</td>";
                echo "<td>
                <a href='../crud/edit/edit_minat_bakat.php?id=" . $row['id'] . "' class='edit-link'>Edit</a> |
                <a href='?delete_id=" . $row['id'] . "' onclick='return confirmDelete()' class='delete-link'>Delete</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
        }

        // Tutup koneksi
        $conn->close();
        ?>
    </table>
    </div>
</div>
</body>
<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }
</script>
</html>
