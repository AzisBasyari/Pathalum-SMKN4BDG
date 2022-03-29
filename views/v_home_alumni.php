<?php
include "../lib/library.php";

$sql1 = "SELECT * FROM users u, postingan p WHERE p.id_users = u.id_user ORDER BY p.id_postingan DESC LIMIT 6;";
$data1 = $mysqli->query($sql1) or die($mysqli->error);

$sql2 = "SELECT * FROM users u, postingan p WHERE p.id_users = u.id_user ORDER BY p.id_postingan ASC LIMIT 3;";
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
    <!-- <div class="welcome">
        <h2>SELAMAT DATANG</h2>
    </div> -->

    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <img src="../assets/welcome.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block rounded">
                    <h2 class="shadow-cus rounded-pill d-inline-block p-2 mb-2">SELAMAT DATANG</h2>
                    <p class="shadow-cus rounded-pill d-inline-block p-2">Silakan klik <button type='button' class="btn p-0 m-0 text-white text-decoration-underline" data-bs-toggle="modal" data-bs-target='#petunjuk'>disini</button> untuk mendapatkan petunjuk mengenai aplikasi ini</p>
                </div>
            </div>
            <?php while ($postingan = mysqli_fetch_array($data2)){ ?>
            <div class="carousel-item shadow-cus">
                
                <div class="row">
                <div class="col text-center">
                     <a href="v_detail_postingan.php?id_postingan=<?= $postingan['id_postingan'] ?>" >
                     
                        <img src="<?php echo $postingan['photo'] == null ? "../assets/bg.jpeg" : "../uploaded/" . $postingan['photo']; ?>" class="w-cus" alt="...">
                    </a>
                </div>
                <div class="col align-self-center">
                <!-- <div class="carousel-caption d-md-block rounded"> -->
                    <h2 class="text-white p-2 mb-2"> <a href="v_detail_postingan.php?id_postingan=<?= $postingan['id_postingan'] ?>" ><?=$postingan['judul_postingan']?></a></h2>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="box-form">
        <div class="title">
            <h3>Postingan Terbaru</h3>
        </div>
        <?php
        while ($postingan = mysqli_fetch_array($data1)) {
        ?>

            <div class="card">
                <img src="<?php echo $postingan['photo'] == null ? "../assets/bg.jpeg" : "../uploaded/" . $postingan['photo']; ?>" class="card-img-top" alt="Tidak Ada Gambar">
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
                    <a href="v_detail_postingan.php?id_postingan=<?php echo $postingan['id_postingan']; ?>" class="btn btn-primary btn-link">Read More...</a>
                    <small>Created by: <?php echo $postingan['username']; ?></small>
                    <small>on <?php echo $postingan['tanggal_dibuat']; ?></small>
                </div>
            </div>

        <?php
        }
        ?>

        <a style="text-align:center; grid-column-start: 2;" href="?page=postingan">Lihat Postingan Lainnya...</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="petunjuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Petunjuk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <p class="text-dark">Setelah anda melakukan login pada aplikasi ini, selanjutnya anda dapat langsung</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>