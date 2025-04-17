<div class="grid__column-10">
    <?php
        if(isset($_GET['page'])) {
            $temp = $_GET['page'];
        } else {
            $temp = '';
        }

        if ($temp == 'shirt'){
            include ("./assets/php/header-component/t-shirt.php");
        } elseif ($temp == 'pant'){
            include ("./assets/php/header-component/pants.php");
        } elseif ($temp == 'shoes'){
            include ("./assets/php/header-component/shoes.php");
        } elseif ($temp == 'Tìm kiếm'){
            include ("./assets/php/header-component/search.php");
        } 
    ?>
</div>
