<?php
include "../lib/library.php";

$sql = "SELECT SUM(jurusan = 'Multimedia') as MM, 
	SUM(jurusan = 'Rekayasa Perangkat Lunak') as RPL,
	SUM(jurusan = 'Teknik Komputer Jaringan') as TKJ,
	SUM(jurusan = 'Teknik Audio Video') as TAV,
	SUM(jurusan = 'Teknik Instalasi Tenaga Listrik') as TITL,
	SUM(jurusan = 'Teknik Otomasi Industri') as TOI
FROM alumni;";
$data = $mysqli->query($sql) or die($mysqli->error);
$jurusan = mysqli_fetch_array($data);

$sql1 = "SELECT SUM(status = 'Bekerja') as kerja, 
	SUM(status = 'Kuliah') as kuliah,
	SUM(status = 'Wirausaha') as usaha,
	SUM(status = 'Tidak Bekerja Ataupun Kuliah') as none
FROM alumni;";
$data1 = $mysqli->query($sql1) or die($mysqli->error);
$lulusan = mysqli_fetch_array($data1);

$sql2 = "SELECT * FROM users u, postingan p WHERE p.id_users = u.id_user ORDER BY p.id_postingan ASC LIMIT 3;";
$data2 = $mysqli->query($sql2) or die($mysqli->error);

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
	<link rel="stylesheet" href="../styles/chart.css">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <h2 class="shadow-cus rounded d-inline-block p-2 mt-0 mb-2">SELAMAT DATANG</h2>
                    <!-- <p class="shadow-cus rounded-pill d-inline-block p-2">Silakan klik <button type='button' class="btn p-0 m-0 text-white text-decoration-underline" data-bs-toggle="modal" data-bs-target='#petunjuk'>disini</button> untuk mendapatkan petunjuk mengenai aplikasi ini</p> -->
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

	<div class="box">
		<div class="box-form">
			<div class="kotakmm">
				<img src="https://img.icons8.com/material-rounded/64/ffffff/frame-rate.png" />
				<h4><?php echo $jurusan['MM']; ?></h4>
				<h5>MULTIMEDIA</h5>
			</div>
			<div class="kotakrpl">
				<img src="https://img.icons8.com/material-rounded/64/ffffff/code.png" />
				<h4><?php echo $jurusan['RPL']; ?></h4>
				<h5>REKAYASA PERANGKAT LUNAK</h5>
			</div>
			<div class="kotaktkj">
				<img src="https://img.icons8.com/material-rounded/64/ffffff/networking-manager.png" />
				<h4><?php echo $jurusan['TKJ']; ?></h4>
				<h5>TEKNIK KOMPUTER JARINGAN</h5>
			</div>
			<div class="kotaktav">
				<img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/ffffff/external-radio-advertising-kiranshastry-solid-kiranshastry-1.png" />
				<h4><?php echo $jurusan['TAV']; ?></h4>
				<h5>TEKNIK AUDIO VIDEO</h5>
			</div>
			<div class="kotaktitl">
				<img src="https://img.icons8.com/pastel-glyph/64/ffffff/electricity.png" />
				<h4><?php echo $jurusan['TITL']; ?></h4>
				<h5>TEKNIK INSTALASI TENAGA LISTRIK</h5>
			</div>
			<div class="kotaktoi">
				<img src="https://img.icons8.com/external-others-made-by-made/50/ffffff/external-electric-electricity-others-made-by-made-18.png" />
				<h4><?php echo $jurusan['TOI']; ?></h4>
				<h5>TEKNIK OTOMASI INDUSTRI</h5>
			</div>
		</div>
	</div>


	<div class="container mt-0">
		<div class="box-form">
			<canvas id="jurusan" width="1000"></canvas>
		</div>
		<div class="container"></div>
		<div class="box-form">
			<canvas id="lulusan" width="1000"></canvas>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<script>
	const ctx = document.getElementById('jurusan');
	const jurusan = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Multimedia', 'Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Teknik Audio Video', 'Teknik Instalasi Tenaga Listrik', 'Teknik Otomasi Industri'],
			datasets: [{
				label: 'Jumlah ',
				data: [<?php echo $jurusan['MM']; ?>, <?php echo $jurusan['RPL']; ?>, <?php echo $jurusan['TKJ']; ?>, <?php echo $jurusan['TAV']; ?>, <?php echo $jurusan['TITL']; ?>, <?php echo $jurusan['TOI']; ?>],
				backgroundColor: [
					'#5F27CD',
					'#1DD1A1',
					'#EE5253',
					'#FECA57',
					'#54A0FF',
					'#94A3B3'
				],
			}],
		},
		options: {
			responsive: true,
			color: '#222831',
			borderWidth: 0,
			plugins: {
				legend: {
					position: 'bottom',
					align: 'center',
					labels: {

					}
				},
				title: {
					display: true,
					text: 'Grafik Jumlah Alumni Berdasarkan Jurusan',
					color: '#222831',
					font: {
						size: 20,
					},
					margin: {
						bottom: 10,
					}
				},
			},
		}
	});
</script>

<script>
	const ctx1 = document.getElementById('lulusan');
	const lulusan = new Chart(ctx1, {
		type: 'doughnut',
		data: {
			labels: ['Bekerja', 'Kuliah', 'Wirausaha', 'Tidak Bekerja Ataupun Kuliah'],
			datasets: [{
				label: 'Jumlah ',
				data: [<?php echo $lulusan['kerja']; ?>, <?php echo $lulusan['kuliah']; ?>, <?php echo $lulusan['usaha']; ?>, <?php echo $lulusan['none']; ?>],
				backgroundColor: [
					'#263238',
					'#726170',
					'#AA94A7',
					'#C4C4C4',
				],
			}],
		},
		options: {
			maintainAspectRation: false,
			responsive: true,
			color: '#222831',
			borderWidth: 0,
			plugins: {
				legend: {
					position: 'bottom',
					align: 'center',
					labels: {

					}
				},
				title: {
					display: true,
					text: 'Grafik Jumlah Alumni Berdasarkan Lulusan',
					color: '#222831',
					font: {
						size: 20,
					},
					margin: {
						bottom: 10,
					}
				},
			},
		}
	});
</script>