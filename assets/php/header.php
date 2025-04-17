<style>
    .header__search-btn {
        font-size: 1.4rem;
        line-height: 1.6rem;
        width: 70px;
    }
</style>

<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
    header("Location:index.php");
}
?>
<header class="header">
    <div class="grid">

        <nav class="header__navbar">
            <div class="header__navbar-filter">

                <ul class="header__navbar-list">
                    <li class="header__navbar-logo">
                        <a href="index.php" class="header__navbar-logo-link"><img src="./assets/img/logo.png" alt="Logo Y&M Store" class="header__navbar-logo-img"></a>
                    </li>
                </ul>

                <ul class="header__navbar-list header__navbar-list--left">
                    <li class="header__navbar-item">
                        <a href="index.php?page=shirt" class="header__navbar-item-link">Áo</a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="index.php?page=pant" class="header__navbar-item-link">Quần</a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="index.php?page=shoes" class="header__navbar-item-link">Giày</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        $sql = "SELECT * FROM ACCOUNTS WHERE A_EMAIL='" . $_SESSION['username'] . "' LIMIT 1";
                        $run = mysqli_query($mysqli, $sql);
                        $res = mysqli_fetch_array($run);
                        if ($res['A_ROLE'] == 'admin') {
                            echo '<li class="header__navbar-item">
                                        <a href="index.php?page=admin" class="header__navbar-item-link">Quản lý sản phẩm</a>
                                    </li>';
                        }
                    }
                    ?>

                </ul>

            </div>

            <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar-item--has-notify">
                    <a href="" class="header__navbar-item-link">
                        <i class="fa-solid fa-bell"></i>
                        Thông báo
                    </a>
                </li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '
                <!-- Khi đã đăng nhập -->
                <li class="header__navbar-item header__navbar-user">
                    <img src="https://th.bing.com/th/id/OIP.JBpgUJhTt8cI2V05-Uf53AHaG1?w=197&h=182&c=7&r=0&o=5&dpr=1.5&pid=1.7" alt="" class="header__navbar-user-avata">
                    <span class="header__navbar-user-name">'.$_SESSION['username'].'</span>

                    <ul class="header__navbar-user-menu">
                        <li class="header__navbar-user-item">
                            <a href="">Tài khoản của tôi</a>
                        </li>
                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                            <a href="index.php?action=logout">Đăng xuất</a>
                        </li>
                    </ul>
                </li>';
                } else {
                    echo '
                <!-- Khi chưa đăng nhâp - xử lý back end -->
                <li class="header__navbar-item header__navbar-item--strong">
                    <a href="index.php?action=register" class="header__navbar-item-link">
                        Đăng ký
                    </a>
                </li>
                <li class="header__navbar-item header__navbar-item--strong">
                    <a href="index.php?action=login" class="header__navbar-item-link">
                        Đăng nhập
                    </a>
                </li>';
                }
                ?>
            </ul>

        </nav>

        <!-- Header with search -->
        <form action="" method="GET">
        <div class="header-with-search">
            <div class="header__empty"></div>
            <div class="header__search">
                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm" class="header__search-input">
                    <input type="submit" name="page" class="header__search-btn" value="Tìm kiếm">
            </div>

            <div class="header__cart">
                <a href=""><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
        </form>
    </div>
</header>