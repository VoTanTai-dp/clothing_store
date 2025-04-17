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
$sql_clear = "DELETE FROM SEARCH_RES";
$query_clear = mysqli_query($mysqli,$sql_clear);

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

$key = $_GET['keyword'];

$sql_shirt = "SELECT * FROM TEE_SHIRTS WHERE T_TITLE LIKE '%".$key."%'";
$query_shirt = mysqli_query($mysqli,$sql_shirt);
while ($row = mysqli_fetch_array($query_shirt)) {
    $sql_add = "INSERT INTO SEARCH_RES VALUES ('".$key."','".$row['T_ID']."')";
    $query_add = mysqli_query($mysqli,$sql_add);
}

$sql_pant = "SELECT * FROM PANTS WHERE P_TITLE LIKE '%".$key."%'";
$query_pant = mysqli_query($mysqli,$sql_pant);
while ($row = mysqli_fetch_array($query_pant)) {
    $sql_add = "INSERT INTO SEARCH_RES VALUES ('".$key."','".$row['P_ID']."')";
    $query_add = mysqli_query($mysqli,$sql_add);
}

$sql_shoes = "SELECT * FROM SHOES WHERE SH_TITLE LIKE '%".$key."%'";
$query_shoes = mysqli_query($mysqli,$sql_shoes);
while ($row = mysqli_fetch_array($query_shoes)) {
    $sql_add = "INSERT INTO SEARCH_RES VALUES ('".$key."','".$row['SH_ID']."')";
    $query_add = mysqli_query($mysqli,$sql_add);
}

$sql = "SELECT * FROM SEARCH_RES LIMIT $begin,10";
$query = mysqli_query($mysqli, $sql);
?>

<div class="home-product">
    <!-- hàng chứa sản phẩm -->
    <div class="grid__row">

        <!-- Div chứa 1 sản phẩm -->
        <!-- Sản phẩm đầu tiên -->
        <?php
        while ($row = mysqli_fetch_array($query)) {
            $shirt = "SELECT * FROM TEE_SHIRTS WHERE T_ID='".$row['SR_ID']."'";
            $shirt_query = mysqli_query($mysqli,$shirt);
            $shirt_row = mysqli_fetch_array($shirt_query);

            if ($shirt_row) {
        ?>
            <div class="grid__column-2-4">

                <!-- Div chứa các thành phần của sản phẩm -->
                <a class="home-product-item" href="../../../../Y&M Store/index.php?page=shirtdetail&id=<?php echo $shirt_row['T_ID'] ?>">
                    <!-- Backend đổi url của sản phẩm-->
                    <div class="home-product-item__img">
                        <img src="assets/php/admin-component/admin-page-shirt/uploads/<?php echo $shirt_row['T_ILLUSTRATION'] ?>">
                    </div>

                    <h4 class="home-product-item__name"><?php echo $shirt_row['T_TITLE'] ?></h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old"><?php echo $shirt_row['T_PRICE'] ?></span>
                        <span class="home-product-item__price-curent">
                            <?php
                            $new_price = $shirt_row['T_PRICE'] - ($shirt_row['T_PRICE'] * $shirt_row['T_DISCOUNT'] / 100);
                            echo $new_price;
                            ?>
                        </span>
                    </div>
                </a>

            </div>
        <?php
            } else {
                $pant = "SELECT * FROM PANTS WHERE P_ID='".$row['SR_ID']."'";
                $pant_query = mysqli_query($mysqli,$pant);
                $pant_row = mysqli_fetch_array($pant_query);

                if ($pant_row) {
        ?>
            <div class="grid__column-2-4">

                <!-- Div chứa các thành phần của sản phẩm -->
                <a class="home-product-item" href="../../../../Y&M Store/index.php?page=pantdetail&id=<?php echo $pant_row['P_ID'] ?>">
                    <!-- Backend đổi url của sản phẩm-->
                    <div class="home-product-item__img">
                        <img src="assets/php/admin-component/admin-page-pant/uploads/<?php echo $pant_row['P_ILLUSTRATION'] ?>">
                    </div>

                    <h4 class="home-product-item__name"><?php echo $pant_row['P_TITLE'] ?></h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old"><?php echo $pant_row['P_PRICE'] ?></span>
                        <span class="home-product-item__price-curent">
                            <?php
                            $new_price = $pant_row['P_PRICE'] - ($pant_row['P_PRICE'] * $pant_row['P_DISCOUNT'] / 100);
                            echo $new_price;
                            ?>
                        </span>
                    </div>
                </a>

            </div>
        <?php
                } else {
                    $shoes = "SELECT * FROM SHOES WHERE SH_ID='".$row['SR_ID']."'";
                    $shoes_query = mysqli_query($mysqli,$shoes);
                    $shoes_row = mysqli_fetch_array($shoes_query);
        ?>
            <div class="grid__column-2-4">
                <!-- Div chứa các thành phần của sản phẩm -->
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <a class="home-product-item" href="../../../../Y&M Store/index.php?page=shoesdetail&id=<?php echo $shoes_row['SH_ID'] ?>">
                    <!-- Backend đổi url của sản phẩm-->
                    <div class="home-product-item__img">
                        <img src="assets/php/admin-component/admin-page-shoes/uploads/<?php echo $shoes_row['SH_ILLUSTRATION'] ?>">
                    </div>

                    <h4 class="home-product-item__name"><?php echo $shoes_row['SH_TITLE'] ?></h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old"><?php echo $shoes_row['SH_PRICE'] ?></span>
                        <span class="home-product-item__price-curent">
                            <?php
                                $new_price = $shoes_row['SH_PRICE'] - ($shoes_row['SH_PRICE'] * $shoes_row['SH_DISCOUNT'] / 100);
                                echo $new_price;
                            ?>
                        </span>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>

<?php
    $sql = "SELECT * FROM SEARCH_RES";
    $query = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($query);
    $num_of_page = ceil($total/10);
?>

<ul class="pagination home-product__pagination">
    <li class="pagination-item">
        <a href="index.php?page=shirt&pagenum=<?php
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
        <a href="index.php?page=shirt&pagenum=<?php echo $i ?>" class="pagination-item__link">
        <?php echo $i ?>
        </a>
    </li>
    <?php
    }
    ?>
    <li class="pagination-item">
        <a href="index.php?page=shirt&pagenum=<?php
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