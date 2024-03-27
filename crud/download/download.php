<?php
if(isset($_POST['download'])) {
    
    $servername = "localhost"; 
    $username = "id21656996_xitjkt2absensi"; 
    $password = "T#kkjj5353"; 
    $dbname = "id21656996_absen_kelas"; 

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil ID siswa dari formulir tombol Download
    $siswa_id = $_POST['siswa_id'];

    // Ambil data siswa dari database berdasarkan ID siswa
    $sql = "SELECT * FROM siswa WHERE id = $siswa_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Buat dokumen Word
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Content-Disposition: attachment; filename=detail_siswa_".$row['nama_siswa'].".docx");

        // Mulai konten dokumen
        $content = "<h2>Detail Siswa</h2>";
        foreach ($row as $key => $value) {
            // Skip ID siswa
            if ($key == "id") continue;

            // Tampilkan kolom data dalam dokumen
            $content .= "<p><strong>" . ucwords(str_replace('_', ' ', $key)) . ":</strong> " . $value . "</p>";
        }

        // Output content
        echo $content;
    } else {
        echo "Data siswa tidak ditemukan.";
    }

    // Tutup koneksi
    $conn->close();
}
?>
