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
    $sql = "INSERT INTO PANTS (P_ID, CO_ID, P_TITLE, S_ID, C_ID, P_PRICE, P_DISCOUNT, P_QUANTITY, P_ILLUSTRATION, P_DESCRPTION) 
                    VALUE ('" . $id . "', '" . $mau . "', '" . $tensanpham . "', '" . $size . "', '" . $loaisanpham . "', '" . $gia . "', '" . $giamgia . "', '" . $soluong . "', '" . $anhminhhoa . "', '" . $mota . "')";
    mysqli_query($mysqli, $sql);
    move_uploaded_file($anhtam, "uploads/".$anhminhhoa);
    header('Location:../../../../index.php?page=quanlyquan&query=add');
} elseif (isset($_POST['suasanpham'])) {
    if ($anhminhhoa != '') {
        move_uploaded_file($anhtam, "uploads/" . $anhminhhoa);

        $sql_anh = "SELECT * FROM PANTS WHERE P_ID='" . $idsp . "'";
        $query_anh = mysqli_query($mysqli, $sql_anh);
        while ($row = mysqli_fetch_array($query_anh)) {
            unlink('uploads/' . $row['P_ILLUSTRATION']);
        }

        $sql_update = "UPDATE PANTS SET P_ID='" . $id . "', CO_ID='" . $mau . "', P_TITLE='" . $tensanpham . "', S_ID='" . $size . "', C_ID='" . $loaisanpham . "', P_PRICE='" . $gia . "', P_DISCOUNT='" . $giamgia . "', P_QUANTITY='" . $soluong . "', P_ILLUSTRATION='" . $anhminhhoa . "', P_DESCRPTION='" . $mota . "' WHERE P_ID = '" . $id . "'";
    } else {
        $sql_update = "UPDATE PANTS SET P_ID='" . $id . "', CO_ID='" . $mau . "', P_TITLE='" . $tensanpham . "', S_ID='" . $size . "', C_ID='" . $loaisanpham . "', P_PRICE='" . $gia . "', P_DISCOUNT='" . $giamgia . "', P_QUANTITY='" . $soluong . "', P_DESCRPTION='" . $mota . "' WHERE P_ID = '" . $id . "'";
    }
    
    mysqli_query($mysqli, $sql_update);
    header('Location:../../../../index.php?page=quanlyquan&query=add');
} elseif (isset($_GET['xoa']) && $_GET['xoa'] == 1) {
    $idsp = $_GET['idsanpham'];

    $sql_anh = "SELECT * FROM PANTS WHERE P_ID='" . $idsp . "'";
    $query_anh = mysqli_query($mysqli, $sql_anh);
    while ($row = mysqli_fetch_array($query_anh)) {
        unlink('uploads/' . $row['P_ILLUSTRATION']);
    }

    $sql_delete = "DELETE FROM PANTS WHERE P_ID = '" . $idsp . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location:../../../../index.php?page=quanlyquan&query=add');
}
