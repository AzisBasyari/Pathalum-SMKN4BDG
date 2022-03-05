<?php
include '../lib/library.php';

if (isset($_GET['id_postingan'])) {
    $id_postingan = $_GET['id_postingan'];
    $sql = "SELECT * FROM postingan, users WHERE id_postingan = " . $id_postingan . " AND postingan.id_users = users.id_user";
    $data = $mysqli -> query($sql) or die($mysqli->error);
    
    if($data->num_rows != 0){  
        $row = mysqli_fetch_array($data);
        $sqldelete = "DELETE FROM postingan WHERE id_postingan = " . $id_postingan;
        $delete = $mysqli -> query($sqldelete) or die($mysqli->error);
        unlink("../uploaded/".$row['photo']);
        echo "<script type='text/javascript'>javascript:history.go(-1)</script>";
    } else {
        echo "error";
    }

}

?>