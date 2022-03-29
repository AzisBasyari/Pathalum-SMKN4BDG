<?php
	include '../lib/library.php';

	$batas = 10;
	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
	$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

	$previous = $halaman - 1;
	$next = $halaman + 1;

	$data = mysqli_query($mysqli,"select * from alumni");
	$jumlah_data = mysqli_num_rows($data);
	$total_halaman = ceil($jumlah_data / $batas);


	$no = 1;
	// $data_alumni = mysqli_query($mysqli, "select * from alumni LIMIT $halaman_awal, $batas");

	$sql_data = "select * from alumni";
    
    $search = @$_POST['search'];
    if (!empty($search)) $sql_data .= " WHERE nama_lengkap LIKE '%$search%'";

    $sql_data .= " ORDER BY alumni.id_alumni asc LIMIT $halaman_awal, $batas";
    $data_alumni = $mysqli->query($sql_data);
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
    <link rel="stylesheet" href="../styles/tabel.css">

    <title>Pathalum</title>
</head>

<body>
<div class="table-container">
	<h2>Data Alumni</h2>

	<form action="#" method="post">
        <div class="col-lg-6 my-3">
            <h6 class="form-label text-white">Cari berdasarkan nama</h6>            
            <div class="d-flex">
                <input type="text" class="form-control me-2" id="search" name="search" placeholder="Masukkan nama">
                <button type="submit" class="btn btn-primary btn-link me-2">Cari</button>
                <button type="submit" class="btn btn-primary btn-link">Reset</button>
            </div>
        </div>
        </form>

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Tahun Masuk</th>
			<th>Tahun Lulus</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php
        
        while ($d = mysqli_fetch_array($data_alumni)) {
            ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_lengkap'] == null ? "Belum Melengkapi Data" : $d['nama_lengkap']; ?></td>
				<td><?php echo $d['jurusan'] == null ? "Belum Melengkapi Data" : $d['jurusan']; ?></td>
				<td><?php echo $d['tahun_masuk'] == null ? "Belum Melengkapi Data" : $d['tahun_masuk']; ?></td>
				<td><?php echo $d['tahun_lulus'] == null ? "Belum Melengkapi Data" : $d['tahun_lulus'];?></td>
				<td><?php echo $d['status'] == null ? "Belum Melengkapi Data" : $d['status']; ?></td>
                <td>
                    <a href="delete.php?id_alumni=<?php echo $d['id_alumni']; ?>">
						<button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
							<img src="https://img.icons8.com/material-rounded/24/ffffff/trash.png"/>
                    	</button>
                    </a>
                    <a href="v_detail_alumni.php?id_alumni=<?php echo $d['id_alumni']; ?>">
                    	<button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
							<img src="https://img.icons8.com/material-rounded/24/ffffff/view-details.png"/>
						</button>
                    </a>
				</td>
			</tr>
			<?php
        }
        ?>
	</table>
</div>
	
	<div class="container">
	<nav aria-label="table-postingan">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='v_admin.php?page=data&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="v_admin.php?page=data&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>	
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='v_admin.php?page=data&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        </nav>
	</div>
</body>
</html>