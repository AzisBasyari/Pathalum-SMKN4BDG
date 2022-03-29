<?php
    include "../lib/library.php";

    $batas = 5;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($mysqli,"select * from postingan");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);


    $no = $halaman_awal+1;;
    $sql_data = "SELECT * FROM users u, postingan p WHERE p.id_users = u.id_user";
    
    $search = @$_POST['search'];
    if (!empty($search)) $sql_data .= " AND judul_postingan LIKE '%$search%'";

    $sql_data .= " ORDER BY p.id_postingan desc LIMIT $halaman_awal, $batas";
    $data_postingan = $mysqli->query($sql_data);
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
    <link rel="stylesheet" href="../styles/post.css">
    <title>Pathalum</title>
</head>

<body>

<h2 class="text-light">Seluruh Postingan</h2>
        <form action="#" method="post">
        <div class="col-lg-6 my-3">
            <h6 class="form-label text-white">Cari berdasarkan judul</h6>            
            <div class="d-flex">
                <input type="text" class="form-control me-2" id="search" name="search" placeholder="Masukkan judul">
                <button type="submit" class="btn btn-primary btn-link me-2">Cari</button>
                <button type="submit" class="btn btn-primary btn-link">Reset</button>
            </div>
        </div>
        </form>

		<?php
        while ($d = mysqli_fetch_array($data_postingan)) {
            ?>

        <div class="box-form mb-2">    
                <h4 class="position-relative"> <?php echo $no++; ?>. <?php echo $d['judul_postingan']; ?> <span class="badge rounded-3 position-absolute top-0 end-0 bg-2"><?php echo $d['kategori']; ?></span></h4>
                <span class="badge rounded-pill bg-2 mb-2">Dibuat oleh <?php echo $d['username']; ?> pada <?php echo $d['tanggal_dibuat']; ?></span>
                <p><?php
                        $deskripsi = $d['deskripsi'];
                        if (strlen($deskripsi) > 100) {
                            echo substr_replace($deskripsi, "...", 100);
                        } else {
                            echo $deskripsi;
                        }
                    ?>
                </p>
                <a href="v_detail_postingan.php?id_postingan=<?php echo $d['id_postingan'];?>" class="mt-2 btn btn-primary btn-link">Read More...</a>
        </div>
        <?php
        }
        ?>

<div class="second-container">
        <nav aria-label="table-postingan">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?page=postingan&halaman=$previous'"; } ?>><</a>
                </li>
                <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=postingan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>	
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?page=postingan&halaman=$next'"; } ?>>></a>
                </li>
            </ul>
        </nav>
    </div>
</body>