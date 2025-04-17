<style>
    .home-product-item__img {
        position: relative;
    }

    .home-product-item__img img {
        width: 210px;
        height: 200px;
        position: absolute;
        top: 0;
    }

    .home-product-item__price {
        padding-bottom: 10px;
    }
</style>

<?php
if (isset($_GET['pagenum'])) {
    $pagenum = $_GET['pagenum'];
} else {
    $pagenum = 1;
}

if ($pagenum == 1) {
    $begin = 0;
} else {
    $begin = ($pagenum * 10) - 10;
}

$sql = "SELECT * FROM PANTS LIMIT $begin,10";
$query = mysqli_query($mysqli, $sql);
?>

<div class="home-product">
    <!-- hàng chứa sản phẩm -->
    <div class="grid__row">

        <!-- Div chứa 1 sản phẩm -->
        <!-- Sản phẩm đầu tiên -->
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="grid__column-2-4">

                <!-- Div chứa các thành phần của sản phẩm -->
                <a class="home-product-item" href="../../../../Y&M Store/index.php?page=pantdetail&id=<?php echo $row['P_ID'] ?>">
                    <!-- Backend đổi url của sản phẩm-->
                    <div class="home-product-item__img">
                        <img src="assets/php/admin-component/admin-page-pant/uploads/<?php echo $row['P_ILLUSTRATION'] ?>">
                    </div>

                    <h4 class="home-product-item__name"><?php echo $row['P_TITLE'] ?></h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old"><?php echo $row['P_PRICE'] ?></span>
                        <span class="home-product-item__price-curent">
                            <?php
                            $new_price = $row['P_PRICE'] - ($row['P_PRICE'] * $row['P_DISCOUNT'] / 100);
                            echo $new_price;
                            ?>
                        </span>
                    </div>
                </a>

            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
    $sql = "SELECT * FROM PANTS";
    $query = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($query);
    $num_of_page = ceil($total/10);
?>

<ul class="pagination home-product__pagination">
    <li class="pagination-item">
        <a href="index.php?page=pant&pagenum=<?php
            if ($pagenum > 1) {
                $page = $pagenum - 1;
                echo $page;
            } else {
                echo "1";
            }
        ?>" class="pagination-item__link">
            <i class="pagination-item__icon fas fa-angle-left"></i>
        </a>
    </li>
    <?php
    for ($i=1;$i<=$num_of_page;$i++) {
    ?>
    <li <?php if ($i == $pagenum) {
        echo 'class="pagination-item pagination-item--active"';
    } else {
        echo 'class="pagination-item"';
    } ?>>
        <a href="index.php?page=pant&pagenum=<?php echo $i ?>" class="pagination-item__link">
        <?php echo $i ?>
        </a>
    </li>
    <?php
    }
    ?>
    <li class="pagination-item">
        <a href="index.php?page=pant&pagenum=<?php
            if ($pagenum < $num_of_page) {
                $page = $pagenum + 1;
                echo $page;
            } else {
                echo $num_of_page;
            }
        ?>" class="pagination-item__link">
            <i class="pagination-item__icon fas fa-angle-right"></i>
        </a>
    </li>
</ul>