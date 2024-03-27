<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="web icon" type="icon" href="../assets/image/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/main.css?v=<?php echo time(); ?>">
    <title>Detail Siswa</title>
</head>
<body>
    <div class="navUpper">
        <div class="menu">  
            <i class='bx bx-menu-alt-left menuActive' ></i>
        </div>
    </div>
    <div class="header" id="header">
        <div class="nav">
            <div class="navWrap">
                <i class='bx bx-menu' id="btn" ></i>
                <!-- <h4>Menu</h4> -->
                <a href="home.php">
                    <i class='bx bxs-home'></i>
                    <p>Beranda</p>
                </a>
                <!-- <h4>Siswa</h4> -->
                <a href="profile.php">
                    <i class='bx bxs-user'></i>
                    <p>Profil</p>
                </a>
                <a href="karirSiswa.php">
                <i class='bx bx-add-to-queue'></i>
                    <p>Karir</p>
                </a>
                <a href="siswaBerprestasi.php">
                <i class='bx bx-medal'></i>
                    <p>Prestasi</p>
                </a>
                <a href="minatBakat.php">
                <i class='bx bx-bar-chart-alt-2'></i>
                    <p>Minat</p>
                </a>
                <a href="#">
                    <i class='bx bx-import'></i>
                    <p>Import</p>
                </a>
                <!-- <h4>Lainnya</h4> -->
                <a href=".././index.php">
                    <i class='bx bx-log-out-circle'></i>
                    <p>Keluar</p>
                </a>
                
            </div>
        </div>
    </div>
    <script>
        let menuBtn = document.querySelector('#btn');
        let sideMenu = document.querySelector('.header');
        let isMenuActive = true;

        menuBtn.addEventListener('click', () => {
            if (!isMenuActive) {
                sideMenu.classList.add('sideActive');
                isMenuActive = true;
            } else {
                sideMenu.classList.remove('sideActive');
                isMenuActive = false;
            }
        });

    </script>
   </body>
</html>
