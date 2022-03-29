<!-- 
LIST TO DO ON HERE :
- This file to create the fixed button and form
- Getting data from form using the post method
- Admin can post the title, context and media (photo or video) on form
-->                          
                                <!-- READ THIS BEFORE RUN
Make sure you have configure "php.ini" file on your xampp folder, search for 'file_uploads' and set it to 
'On' like this 'file_uploads = On' -->
<?php
include '../lib/library.php';
    if (isset($_POST['posting'])) {
        $judul = $_POST['judul_postingan'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
	    $nama = $_FILES['file']['name'];
	    $x = explode('.', $nama);
	    $ekstensi = strtolower(end($x));
	    $ukuran	= $_FILES['file']['size'];
	    $file_tmp = $_FILES['file']['tmp_name'];

        $user = $_SESSION['id_user'];


        if(!empty($nama)){
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070){			
                move_uploaded_file($file_tmp, '../uploaded/'.$nama);
                $sql = "INSERT INTO postingan(judul_postingan, deskripsi, id_users, tanggal_dibuat, photo, kategori) VALUES ('$judul', '$deskripsi', '$user', CURDATE(), '$nama', '$kategori')";
                $data = $mysqli -> query($sql) or die($mysqli->error);
                if($data){
                    echo 'FILE BERHASIL DI UPLOAD';
                }else{
                    echo 'GAGAL MENGUPLOAD GAMBAR';
                }
                 }else{
                echo 'UKURAN FILE TERLALU BESAR';
                 }
            }else{
                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            }
        } else {
            $sql = "INSERT INTO postingan(judul_postingan, deskripsi, id_users, tanggal_dibuat, photo, kategori) VALUES ('$judul', '$deskripsi', '$user', CURDATE(), NULL, '$kategori')";
            $data = $mysqli -> query($sql) or die($mysqli->error);
        }

    }

    $batas = 5;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

        $previous = $halaman - 1;
        $next = $halaman + 1;

        $data = mysqli_query($mysqli,"select * from postingan");
		$jumlah_data = mysqli_num_rows($data);
		$total_halaman = ceil($jumlah_data / $batas);


        $no = $halaman_awal+1;
         $sql_data = "SELECT id_postingan, judul_postingan, deskripsi, kategori, tanggal_dibuat, username, id_users FROM users u, postingan p WHERE p.id_users = u.id_user";
    
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
    <link rel="stylesheet" href="../styles/popup.css">
    <title>Pathalum</title>
</head>





<body>   

<!--BOOTSTRAPS FOR FORM POSTINGAN-->
            <script
            href="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>




<!-- ADMIN WILL SEE THE POSTS ON HERE -->
<div class="main-container">
    <div class="title">    
        <h2>Atur Postingan</h2>
        <button type="button" class="btn btn-primary btn-tambah" data-bs-toggle="modal" data-bs-target="#adminaddpost">
            <img src="https://img.icons8.com/windows/32/000000/plus-math.png"/>
        </button>
    </div>

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

<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Judul Postingan</th>
			<th>Deskripsi</th>
            <th>Kategori</th>
			<th>Pembuat</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
		<?php
        
        while ($d = mysqli_fetch_array($data_postingan)) {
            ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['judul_postingan'] == null ? "Tidak Ada Judul" : $d['judul_postingan']; ?></td>
				<td>
                    <?php
                        $deskripsi = $d['deskripsi'];
                        if (strlen($deskripsi) > 20) {
                            echo substr_replace($deskripsi, "...", 20);
                        } 
                    ?>
                </td>
                <td><?php echo $d['kategori'] == null ? "Kategori tidak diketahui" : $d['kategori']; ?></td>
				<td><?php echo $d['username'] == null ? "Pembuat tidak diketahui" : $d['username']; ?></td>
				<td><?php echo $d['tanggal_dibuat'] == null ? "Tanggal buat tidak diketahui" : $d['tanggal_dibuat']; ?></td>
                <td style="text-align: center;">
                    <a href="v_detail_postingan.php?id_postingan=<?php echo $d['id_postingan'];?>">
                    	<button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
                            <img src="https://img.icons8.com/material-rounded/24/ffffff/view-details.png"/>
						</button>
                    </a>
                    <?php
                        if ($d['id_users'] == 1) {
                    ?>
                    <a href="v_edit_postingan.php?id_postingan=<?php echo $d['id_postingan']; ?>">
                        <button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
                            <img src="https://img.icons8.com/material-rounded/24/ffffff/edit--v1.png"/>
                        </button>
                    </a>
                    <?php
                        }
                    ?>
                    <a href="delete_postingan.php?id_postingan=<?php echo $d['id_postingan'];?>">
                        <button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
                            <img src="https://img.icons8.com/material-rounded/24/ffffff/trash.png"/>
                        </button>
                    </a>
				</td>
			</tr>
			<?php
        }
        ?>
	</table>


<script type="text/javascript" src="file.js"></script>


    <div class="second-container">
        <nav aria-label="table-postingan">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='v_admin.php?page=postingan&halaman=$previous'"; } ?>><</a>
                </li>
                <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="v_admin.php?page=postingan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>	
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='v_admin.php?page=postingan&halaman=$next'"; } ?>>></a>
                </li>
            </ul>
        </nav>
    </div>
</div>





<!-- ADMIN WILL PUT THE DATA ON HERE (FORM POSTINGAN)-->

    <div class="modal fade" id="adminaddpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Postingan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <textarea name="judul_postingan" id="" cols="30" rows="1" placeholder="Judul Postingan"></textarea>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" placeholder="Deskripsi Postingan"></textarea>
                    </div>

                    
                    <div class="upload">
                        <label for="file"  class="custom-file form-label">Unggah File/Foto</label>
                        <input type="file" id="file" name="file"  accept="image/*" onchange="loadFile(event)" class="form-control form-control-sm"></input>
                        <span>*Foto yang diunggah harus berekstensi JPG, JPEG, atau PNG dan berukuran 1MB.</span>
                        <img id="preview" width="100%"/>
                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('preview');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                        </script>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div>
                    <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori">
                            <option value="Beasiswa">Beasiswa</option>
                            <option value="Loker">Lowongan Pekerjaan</option>
                            </select>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-buat" value="posting" name="posting" data-bs-dismiss="modal">Buat</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>