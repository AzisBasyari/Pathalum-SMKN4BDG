<?php
include "../lib/library.php";

if (isset($_GET['id_postingan'])) {
    $id_postingan = $_GET['id_postingan'];
    $sql = "SELECT * FROM postingan, users WHERE id_postingan = " . $id_postingan . " AND postingan.id_users = users.id_user";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_array();
    } else {
        exit("ID Tidak ditemukan.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/detail.css">

    <title>Pathalum</title>
</head>

<body>
    <div class="header">
        <ul class="nav">
            <li class="nav-item navbar-brand back">
                <a href="" onclick="window.history.go(-1); return false;">
                    <img src="https://img.icons8.com/material-rounded/48/ffffff/left.png"/>
                </a>
            </li>
            <li class="nav-item navbar-brand">
                <img src="../assets/logo/SMKN4.svg" alt="" width="50" height="50" class="smkn4" />
                SMKN 4 BANDUNG
            </li>
        </ul>
    </div>

    <div class="main-container box-form">
        <h3><?php echo $data['judul_postingan'];?></h3>

        <div class="line"></div>

        <div class="image">
            <img src="../uploaded/<?php echo $data['photo'];?>" width="100%" alt="" class="uploaded"/>
        </div>
        
        <div class="content">
            <p><?php echo $data['deskripsi'];?></p>
        </div>

        <div class="footer">
            <p>Dibuat oleh: <?php echo $data['username'];?></p>
            <p><?php echo $data['tanggal_dibuat'];?></p>
        </div>
    </div>
</body>