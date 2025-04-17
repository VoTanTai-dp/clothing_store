<?php
require_once('../../config/config.php');

$id = $_POST['idsanpham'];
$loaisanpham = $_POST['loaisanpham'];
$tensanpham = $_POST['tensanpham'];
$size = $_POST['size'];
$mau = $_POST['mausanpham'];
$gia = $_POST['giasanpham'];
$giamgia = $_POST['giamgia'];
$soluong = $_POST['soluong'];
$anhminhhoa = $_FILES['anhminhhoa']['name'];
$anhtam = $_FILES['anhminhhoa']['tmp_name'];
$mota = $_POST['mota'];

if (isset($_POST['themsanpham'])) {
    $sql = "INSERT INTO TEE_SHIRTS (T_ID, CO_ID, T_TITLE, S_ID, C_ID, T_PRICE, T_DISCOUNT, T_QUANTITY, T_ILLUSTRATION, T_DESCRPTION) 
                    VALUE ('" . $id . "', '" . $mau . "', '" . $tensanpham . "', '" . $size . "', '" . $loaisanpham . "', '" . $gia . "', '" . $giamgia . "', '" . $soluong . "', '" . $anhminhhoa . "', '" . $mota . "')";
    mysqli_query($mysqli, $sql);
    move_uploaded_file($anhtam, "uploads/".$anhminhhoa);
    header('Location:../../../../index.php?page=quanlyao');
} elseif (isset($_POST['suasanpham'])) {
    if ($anhminhhoa != '') {
        move_uploaded_file($anhtam, "uploads/" . $anhminhhoa);

        $sql_anh = "SELECT * FROM TEE_SHIRTS WHERE T_ID='" . $idsp . "'";
        $query_anh = mysqli_query($mysqli, $sql_anh);
        while ($row = mysqli_fetch_array($query_anh)) {
            unlink('uploads/' . $row['T_ILLUSTRATION']);
        }

        $sql_update = "UPDATE TEE_SHIRTS SET T_ID='" . $id . "', CO_ID='" . $mau . "', T_TITLE='" . $tensanpham . "', S_ID='" . $size . "', C_ID='" . $loaisanpham . "', T_PRICE='" . $gia . "', T_DISCOUNT='" . $giamgia . "', T_QUANTITY='" . $soluong . "', T_ILLUSTRATION='" . $anhminhhoa . "', T_DESCRPTION='" . $mota . "' WHERE T_ID = '" . $id . "'";
    } else {
        $sql_update = "UPDATE TEE_SHIRTS SET T_ID='" . $id . "', CO_ID='" . $mau . "', T_TITLE='" . $tensanpham . "', S_ID='" . $size . "', C_ID='" . $loaisanpham . "', T_PRICE='" . $gia . "', T_DISCOUNT='" . $giamgia . "', T_QUANTITY='" . $soluong . "', T_DESCRPTION='" . $mota . "' WHERE T_ID = '" . $id . "'";
    }
    
    mysqli_query($mysqli, $sql_update);
    header('Location:../../../../index.php?page=quanlyao');
} elseif (isset($_GET['xoa']) && $_GET['xoa'] == 1) {
    $idsp = $_GET['idsanpham'];

    $sql_anh = "SELECT * FROM TEE_SHIRTS WHERE T_ID='" . $idsp . "'";
    $query_anh = mysqli_query($mysqli, $sql_anh);
    while ($row = mysqli_fetch_array($query_anh)) {
        unlink('uploads/' . $row['T_ILLUSTRATION']);
    }

    $sql_delete = "DELETE FROM TEE_SHIRTS WHERE T_ID = '" . $idsp . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location:../../../../index.php?page=quanlyao');
}
