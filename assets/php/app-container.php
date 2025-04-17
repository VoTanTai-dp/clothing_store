<div class="app__container">

    <div class="grid">

        <div class="grid__row">
            <?php
            if (isset($_GET['page'])) {
                $temp = $_GET['page'];
            } else {
                $temp = '';
            }

            if (!isset($_GET['page'])) {
                include("./assets/php/header-component/index.php");
            } elseif ($temp == 'shirtdetail'){
                include ("./assets/php/product-detail/shirt-detail.php");
            } elseif ($temp == 'pantdetail'){
                include ("./assets/php/product-detail/pant-detail.php");
            }elseif ($temp == 'shoesdetail'){
                include ("./assets/php/product-detail/shoes-detail.php");
            } elseif ($temp == 'admin'){
                include ("assets\php\admin-component\admin-page.php");
            } elseif ($temp == 'quanlyao'){
                include ("assets\php\admin-component\admin-page.php");
            } elseif ($temp == 'quanlyquan'){
                include ("assets\php\admin-component\admin-page.php");
            } elseif ($temp == 'quanlygiay'){
                include ("assets\php\admin-component\admin-page.php");
            } elseif ($temp == 'quanlytaikhoan'){
                include ("assets\php\admin-component\admin-page.php");
            } else {
                include("app-container-component/filters.php");
                include("app-container-component/main.php");
            }
            ?>
        </div>
    </div>
</div>