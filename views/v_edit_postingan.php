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

if (isset($_POST['update'])) {
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


    if (!empty($nama)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../uploaded/'.$nama);
                $sql = "UPDATE `postingan` SET judul_postingan='$judul', deskripsi='$deskripsi', kategori='$kategori', photo='$nama' WHERE id_postingan=$id_postingan";
                unlink("../uploaded/".$data['photo']);
                $data = $mysqli -> query($sql) or die($mysqli->error);
                if ($data) {
                    echo 'FILE BERHASIL DI UPLOAD';
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo 'GAGAL MENGUPLOAD GAMBAR';
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            } else {
                echo 'UKURAN FILE TERLALU BESAR';
                echo "<meta http-equiv='refresh' content='0'>";
            }
        } else {
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            echo "<meta http-equiv='refresh' content='0'>";
        }
    } else {
        $sql = "UPDATE `postingan` SET judul_postingan='$judul', deskripsi='$deskripsi', kategori='$kategori' WHERE id_postingan=$id_postingan";
        $data = $mysqli -> query($sql) or die($mysqli->error);
        echo "<meta http-equiv='refresh' content='0'>";
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
    <link rel="stylesheet" href="../styles/popup.css">

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
    <form action="" method="post" enctype="multipart/form-data">
        <label for="judul_postingan" id="judul_postingan-label">
            <span>Judul Postingan</span>
            <input type="text" id="judul_postingan" name="judul_postingan"
                placeholder="Masukkan Judul Postingan"
                value="<?php echo $data['judul_postingan']?>" />
        </label>

        <label for="deskripsi" id="deskripsi-label">
            <span>Deskripsi Postingan</span>
            <textarea id="deskripsi" name="deskripsi"
                placeholder="Masukkan Deskripsi Postingan"><?php echo $data['deskripsi']?>
            </textarea>
        </label>

        <!-- <div class="line"></div> -->

        <label for="kategori" id="kategori-label">
            <span>Kategori</span>
            <select id="kategori" name="kategori"">
                <option value="<?php echo $data['kategori']?>"><?php echo $data['kategori']?></option>
                <option disabled>──────────</option>
                <option value="Loker">Loker</option>
                <option value="Beasiswa">Beasiswa</option>
            </select>
        </label>
        
        <div class="image">
            <span>Foto Saat Ini:</span>
            <img src="../uploaded/<?php echo $data['photo'];?>" width="100%" alt="" class="uploaded mb-3"/>
        </div>

        <label for="option" id="option-label">
            <span class="my-5">Apakah anda ingin mengupdate foto?</span>
           <!-- <span id='file-span' class="mb-5">Unggah Foto</span> -->
            <input type='file' id='file' name='file' accept='image/*' onchange='loadFile(event)' class='form-control form-control-sm'></input>
            <span>*Foto yang diunggah harus berekstensi JPG, JPEG, atau PNG dan berukuran 1MB.</span>
            <img id="preview" width="100%"/>`;
        </label>


        <label for="file" id="file-label">
        </label>

        <button class="btn btn-primary btn-buat m-0" type="submit" name="update" value="update">Update Postingan</button>
    </form>
    </div>

    <script>
        /* function tampilkan(){
        var values = document.getElementById("option").value;
        if(values =="Ya"){
            document.getElementById('file-label').innerHTML =
            `<span id='file-span' class="mb-5">Unggah Foto</span>
            <input type='file' id='file' name='file' accept='image/*' onchange='loadFile(event)' class='form-control form-control-sm'></input>
            <span>*Foto yang diunggah harus berekstensi JPG, JPEG, atau PNG dan berukuran 1MB.</span>
            <img id="preview" width="100%"/>`;
        } else {
            document.getElementById('file-label').innerHTML= '';
        }
        } */

        var loadFile = function(event) {
                                var output = document.getElementById('preview');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                                }
                            };
    </script>
</body>
</html>