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
    $sql = "INSERT INTO SHOES (SH_ID, CO_ID, SH_TITLE, S_ID, C_ID, SH_PRICE, SH_DISCOUNT, SH_QUANTITY, SH_ILLUSTRATION, SH_DESCRPTION) 
                    VALUE ('" . $id . "', '" . $mau . "', '" . $tensanpham . "', '" . $size . "', '" . $loaisanpham . "', '" . $gia . "', '" . $giamgia . "', '" . $soluong . "', '" . $anhminhhoa . "', '" . $mota . "')";
    mysqli_query($mysqli, $sql);
    move_uploaded_file($anhtam, "uploads/".$anhminhhoa);
    header('Location:../../../../index.php?page=quanlygiay&query=add');
} elseif (isset($_POST['suasanpham'])) {
    if ($anhminhhoa != '') {
        move_uploaded_file($anhtam, "uploads/" . $anhminhhoa);

        $sql_anh = "SELECT * FROM SHOES WHERE SH_ID='" . $idsp . "'";
        $query_anh = mysqli_query($mysqli, $sql_anh);
        while ($row = mysqli_fetch_array($query_anh)) {
            unlink('uploads/' . $row['SH_ILLUSTRATION']);
        }

        $sql_update = "UPDATE SHOES SET SH_ID='" . $id . "', CO_ID='" . $mau . "', SH_TITLE='" . $tensanpham . "', S_ID='" . $size . "', C_ID='" . $loaisanpham . "', SH_PRICE='" . $gia . "', SH_DISCOUNT='" . $giamgia . "', SH_QUANTITY='" . $soluong . "', SH_ILLUSTRATION='" . $anhminhhoa . "', SH_DESCRPTION='" . $mota . "' WHERE SH_ID = '" . $id . "'";
    } else {
        $sql_update = "UPDATE SHOES SET SH_ID='" . $id . "', CO_ID='" . $mau . "', SH_TITLE='" . $tensanpham . "', S_ID='" . $size . "', C_ID='" . $loaisanpham . "', SH_PRICE='" . $gia . "', SH_DISCOUNT='" . $giamgia . "', SH_QUANTITY='" . $soluong . "', SH_DESCRPTION='" . $mota . "' WHERE SH_ID = '" . $id . "'";
    }
    
    mysqli_query($mysqli, $sql_update);
    header('Location:../../../../index.php?page=quanlygiay&query=add');
} elseif (isset($_GET['xoa']) && $_GET['xoa'] == 1) {
    $idsp = $_GET['idsanpham'];

    $sql_anh = "SELECT * FROM SHOES WHERE SH_ID='" . $idsp . "'";
    $query_anh = mysqli_query($mysqli, $sql_anh);
    while ($row = mysqli_fetch_array($query_anh)) {
        unlink('uploads/' . $row['SH_ILLUSTRATION']);
    }

    $sql_delete = "DELETE FROM SHOES WHERE SH_ID = '" . $idsp . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location:../../../../index.php?page=quanlygiay&query=add');
}
