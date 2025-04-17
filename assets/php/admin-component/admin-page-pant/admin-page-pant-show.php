<style>
    .product__table {
        margin: 30px 20px 20px;
        background-color: var(--white-color);
    }

    .product__table th {
        font-size: 1.6rem;
        line-height: 1.9rem;
        text-align: center;
        color: var(--text-color);
    }

    .product__table td {
        font-size: 1.4rem;
        line-height: 1.6rem;
        text-align: center;
        color: var(--text-color);
    }

    .product__table a {
        text-decoration: none;
    }

    .product__table img {
        height: 120px;
        width: 100px;
    }
</style>

<?php
require_once('assets\php\config\config.php');

$sql_show = "SELECT * FROM PANTS ORDER BY P_ID DESC";
$query_show = mysqli_query($mysqli, $sql_show);

?>
<div class="product__show">
    <h3 class="product__title">Danh mục sản phẩm</h3>
    <div class="product__table">
        <table border="1" style="width: 100%; border-collapse:collapse;">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Màu sắc</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Quản lý</th>
            </tr>

            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_show)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $row['P_ID'] ?></td>
                    <td><?php echo $row['P_TITLE'] ?></td>
                    <td><?php echo $row['CO_ID'] ?></td>
                    <td><?php echo $row['S_ID'] ?></td>
                    <td><?php echo $row['P_PRICE'] ?></td>
                    <td><?php echo $row['P_DISCOUNT'] ?></td>
                    <td><?php echo $row['P_QUANTITY'] ?></td>
                    <td><img src="assets/php/admin-component/admin-page-pant/uploads/<?php echo $row['P_ILLUSTRATION'] ?>"></td>
                    <td>
                        <a href="assets\php\admin-component\admin-page-pant\admin-page-pant-process.php?xoa=1&idsanpham=<?php echo $row['P_ID'] ?>">Xóa</a> | 
                        <a href="?page=quanlyquan&query=alter&idsanpham=<?php echo $row['P_ID'] ?>">Sửa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>