<style>
    /* Css Function */
    .function__list {
        color: var(--text-color);
        font-size: 2rem;
        font-weight: 400;
        line-height: 2.6rem;
        padding: 10px 0;
        background-color: var(--white-color);
    }

    .function__item {
        list-style: none;
        padding: 5px 10px;
        border-top: 1px solid #333;
    }

    .function__item:first-child {
        border-top: none;
    }

    .function__item:last-child {
        border-bottom: none;
    }

    .function__item:hover {
        cursor: pointer;
        background-color: var(--primary-color-hover);
    }

    .function__link {
        text-decoration: none;
    }

    .grid {
        /* Tuong thich voi cac kich thuoc man hinh */
        width: 1400px;
        max-width: 100%;
        margin: 0 auto;
    }

    .grid__roww {
        /* Set cho cac element nam ngang tren 1 hang */
        display: flex;
        flex-wrap: wrap;
        margin-left: -12px;
        margin-right: -12px;
    }

    /* Thiết kế phần main của trên web theo quye tắc 12 cột */
    /* Css cho 2 cột của filter */
    .grid__2 {
        padding-left: 12px;
        padding-right: 12px;
        width: 16.6667%;
    }

    /* Css 10 cột của thẻ chứa sản phẩm */
    .grid__10 {
        padding-left: 12px;
        padding-right: 12px;
        width: 83.3333%;
    }
</style>

<div class="grid">
    <div class="grid__roww">
        <div class="grid__2">
            <ul class="function__list">
                <li class="function__item">
                    <a href="index.php?page=quanlyao&query=add" class="function__link">Quản lý áo</a>
                </li>
                <li class="function__item">
                    <a href="index.php?page=quanlyquan&query=add" class="function__link">Quản lý quần</a>
                </li>
                <li class="function__item">
                    <a href="index.php?page=quanlygiay&query=add" class="function__link">Quản lý giày</a>
                </li>
                <li class="function__item">
                    <a href="index.php?page=quanlytaikhoan&query=add" class="function__link">Quản lý tài khoản</a>
                </li>
            </ul>
        </div>

        <div class="grid__10">
            <?php
            if (isset($_GET['page']) && isset($_GET['query'])) {
                $temp = $_GET['page'];
                $query = $_GET['query'];
            } else {
                $temp = '';
                $query = '';
            }

            if ($temp == 'quanlyao' && $query =='alter') {
                include("assets\php\admin-component\admin-page-shirt\admin-page-shirt-alter.php");
            } elseif ($temp == 'quanlyquan' && $query =='add') {
                include("assets\php\admin-component\admin-page-pant\admin-page-pant-add.php");
                include("assets\php\admin-component\admin-page-pant\admin-page-pant-show.php");
            } elseif ($temp == 'quanlyquan' && $query =='alter') {
                include("assets\php\admin-component\admin-page-pant\admin-page-pant-alter.php");
            } elseif ($temp == 'quanlygiay' && $query =='add') {
                include("assets\php\admin-component\admin-page-shoes\admin-page-shoes-add.php");
                include("assets\php\admin-component\admin-page-shoes\admin-page-shoes-show.php");
            } elseif ($temp == 'quanlygiay' && $query =='alter') {
                include("assets\php\admin-component\admin-page-shoes\admin-page-shoes-alter.php");
            } elseif ($temp == 'quanlytaikhoan' && $query =='add') {
                include("assets\php\admin-component\admin-page-account\admin-page-accounts-add.php");
            } else {
                include("assets\php\admin-component\admin-page-shirt\admin-page-shirt-add.php");
                include("assets\php\admin-component\admin-page-shirt\admin-page-shirt-show.php");
            }
            ?>
        </div>
    </div>
</div>