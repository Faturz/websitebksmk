<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Perencanaan Karir Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
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
        <h2>Form Perencanaan Karir Siswa</h2>
        <form action="proses.php" method="post">
            <label for="nama">Nama Siswa:</label><br>
            <input type="text" id="nama" name="nama" required><br><br>

            <label for="perencanaan">Perencanaan Karir:</label><br>
            <select id="perencanaan" name="perencanaan" required>
                <option value="">Pilih Perencanaan Karir</option>
                <option value="wirausaha">Wirausaha</option>
                <option value="bekerja">Bekerja</option>
                <option value="melanjutkan kuliah">Melanjutkan Kuliah</option>
            </select><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
