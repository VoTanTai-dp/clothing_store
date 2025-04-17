<style>
    /* Product detail */
    .product {
        margin: 20px 12px;
        display: flex;
        flex-wrap: wrap;
    }

    .product__img {
        flex: 1;
        background-color: var(--white-color);
        border-radius: 3px;
    }

    .product__img-link {
        width: 750px;
        height: 800px;
        border-radius: 3px;
    }

    .product__detail {
        flex: 1;
        margin-left: 20px;
        background-color: var(--white-color);
        max-height: 300px;
        border-radius: 3px;
    }

    .product__detail-title {
        text-align: center;
        font-size: 2.6rem;
        color: var(--text-color);
    }

    .product__detail-infor {
        margin-top: 30px;
    }

    .product__detail-name {
        font-size: 2rem;
        margin-left: 20px;
        color: var(--text-color);
    }

    .product__detail-price-old {
        font-size: 2rem;
        color: #666;
        text-decoration: line-through;
        margin-left: 10px;
        margin-left: 20px;
    }

    .product__detail-price-curent {
        margin-left: 10px;
        font-size: 2rem;
        color: var(--primary-color);
    }

    .product__detail-size {
        margin-top: 20px;
        display: flex;
        align-items: baseline;
        width: 450px;
        margin-left: 20px;
    }

    .product__detail-size-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-color);
    }

    .size-clothing__allbuttons {
        display: flex;
        justify-content: space-around;
        margin-left: 10px;
    }

    .product__detail-size-message {
        margin-left: 20px;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--primary-color);
    }

    .product__detail-buy {
        margin: 30px 0 30px 20px;
    }

    .product__detail-submit {
        width: 100px;
        height: 30px;
        font-size: 1.4rem;
        font-weight: 500;
        color: var(--white-color);
        background-color: var(--primary-color);
        border-radius: 5px;
    }

    .product__detail-submit:hover {
        cursor: pointer;
        background-color: var(--primary-color-hover);
    }

    .product__description {
        margin-top: 30px;
        background-color: var(--white-color);
        border-radius: 3px;
    }

    .product__description-title {
        text-align: center;
        font-size: 2.6rem;
        font-weight: 700;
        color: var(--text-color);
    }

    .product__description-infor {
        margin: 20px;
        font-size: 2rem;
        color: var(--text-color);
        font-weight: 300;
        line-height: 2.6rem;
    }
</style>

<?php
$sql = "SELECT * FROM SHOES WHERE SH_ID='" . $_GET['id'] . "'";
$query = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($query);
?>

<script>
    $(document).ready(function () {
        $("#36").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "36"
            });
        });
        $("#37").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "37"
            });
        });
        $("#38").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "38"
            });
        });
        $("#39").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "39"
            });
        });
        $("#40").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "40"
            });
        });
        $("#41").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "41"
            });
        });
        $("#42").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "42"
            });
        });
        $("#43").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "43"
            });
        });
        $("#44").click(function () {
            $("#mess").load("assets/php/product-detail/product-detail-process.php",{
                size: "44"
            });
        });
    });
</script>

<div class="product">
    <div class="product__img">
        <img src="assets\php\admin-component\admin-page-shoes\uploads\<?php echo $row['SH_ILLUSTRATION']?>" class="product__img-link">
    </div>
    <div class="product__detail">
        <h2 class="product__detail-title">CHI TIẾT SẢN PHẨM</h2>
        <div class="product__detail-infor">

            <h3 class="product__detail-name"><?php echo $row['SH_TITLE']?></h3>
            <span class="product__detail-price-old"><?php echo $row['SH_PRICE']?></span>
            <span class="product__detail-price-curent">
                <?php
                $newprice = $row['SH_PRICE'] - ($row['SH_PRICE'] * $row['SH_DISCOUNT'] / 100);
                echo $newprice;
                ?>
            </span>

            <div class="product__detail-size">
                <span class="product__detail-size-title">SIZE: </span>
                <div class="size-clothing__allbuttons">
                    <button id="36" type="button" class="size__button">36</button>
                    <button id="37" type="button" class="size__button">37</button>
                    <button id="38" type="button" class="size__button">38</button>
                    <button id="39" type="button" class="size__button">39</button>
                    <button id="40" type="button" class="size__button">40</button>
                    <button id="41" type="button" class="size__button">41</button>
                    <button id="42" type="button" class="size__button">42</button>
                    <button id="43" type="button" class="size__button">43</button>
                    <button id="44" type="button" class="size__button">44</button>
                </div>
            </div>
            <div id="mess">
                <p class="product__detail-size-message">Bạn đã chọn size: </p>
            </div>        

            <div class="product__detail-buy">
                <button class="product__detail-submit">MUA</button>
            </div>
        </div>
    </div>
    <div class="product__description">
        <h2 class="product__description-title">THÔNG TIN SẢN PHẨM</h2>
        <p class="product__description-infor">
            <?php echo $row['SH_DESCRPTION']?>
        </p>
    </div>
</div>