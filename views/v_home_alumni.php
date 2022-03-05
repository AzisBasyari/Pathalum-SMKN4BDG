<?php
include "../lib/library.php";

$sql1 = "SELECT * FROM users u, postingan p WHERE p.id_users = u.id_user ORDER BY p.id_postingan DESC LIMIT 3;";
$data1 = $mysqli->query($sql1) or die($mysqli->error);

$sql2 = "SELECT * FROM users u, postingan p WHERE p.id_users = u.id_user AND u.level = 'admin' ORDER BY p.id_postingan ASC LIMIT 3;";
$data2 = $mysqli->query($sql1) or die($mysqli->error);
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
    <link rel="stylesheet" href="../styles/halaman_utama.css">

    <title>Pathalum</title>
</head>

<body>
    <div class="welcome">
        <h2>SELAMAT DATANG</h2>
    </div>

            <div class="box-form">
                <div class="title">
                    <h3>Postingan Terbaru</h3>
                </div>
                <?php
                while ($postingan = mysqli_fetch_array($data1)) {
                ?>

                    <div class="card">
                        <img src="<?php echo $postingan['photo'] == null ? "../assets/bg.jpeg" : "../uploaded/" . $postingan['photo'];?> ? " class="card-img-top" alt="Tidak Ada Gambar">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $postingan['judul_postingan'] ?></h5>
                            <p class="card-text">
                                <?php
                                $deskripsi = $postingan['deskripsi'];
                                if (strlen($deskripsi) > 100) {
                                    echo substr_replace($deskripsi, "...", 100);
                                } else {
                                    echo $deskripsi;
                                }
                                ?>
                            </p>
                        </div>
                        <div class="card-footer">
                        <a href="v_detail_postingan.php?id_postingan=<?php echo $postingan['id_postingan'];?>" class="btn btn-primary btn-link">Read More...</a>
                            <small>Created by: <?php echo $postingan['username']; ?></small>
                            <small>on <?php echo $postingan['tanggal_dibuat']; ?></small>
                        </div>
                    </div>

                <?php
                }
                ?>

                <a style="text-align:center; grid-column-start: 2;"href="?page=postingan">Lihat Postingan Lainnya...</a>
            </div>
</body>

</html>