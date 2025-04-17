<style>
    .product__insert, .product__show{
        margin: 30px 0 20px;
        border: 1px solid var(--black-color);
        border-radius: 3px;
        background-color: var(--white-color);
    }

    .product__title {
        margin-left: 20px;
        color: var(--text-color);
        font-size: 2.4rem;
        font-weight: 500;
    }

    .product__list {
        list-style: none;
    }

    .product__item {
        display: flex;
        align-items: center;
        margin: 0 15px 0 0;

    }

    .product__item-name {
        font-size: 1.6rem;
        line-height: 3.6rem;
        width: 170px;
    }

    .product__item-input {
        flex: 1;
        margin-left: 30px;
        height: 30px;
        font-size: 1.6rem;
    }

    .product__item-input--description {
        height: 200px;
    }

    .product__item-input--submit {
        margin-top: 20px;
        height: 30px;
        width: 150px;
        font-size: 1.6rem;
        font-weight: 400;
        cursor: pointer;
    }
</style>

<form method="POST" action="assets\php\admin-component\admin-page-shirt\admin-page-shirt-process.php" enctype="multipart/form-data">
<div class="product__insert">
    <h3 class="product__title">Thêm sản phẩm</h3>
    <ul class="product__list">
        <li class="product__item">
            <span class="product__item-name">ID của sản phẩm:</span>
            <input type="text" name="idsanpham" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Loại sản phẩm:</span>
            <input type="text" name="loaisanpham" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Tên sản phẩm:</span>
            <input type="text" name="tensanpham" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Size:</span>
            <input type="text" name="size" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Màu sắc:</span>
            <input type="text" name="mausanpham" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Giá sản phẩm:</span>
            <input type="text" name="giasanpham" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Giảm giá:</span>
            <input type="text" name="giamgia" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Số lượng:</span>
            <input type="text" name="soluong" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Ảnh minh họa:</span>
            <input type="file" name="anhminhhoa" class="product__item-input">
        </li>
        <li class="product__item">
            <span class="product__item-name">Mô tả:</span>
            <input type="text" name="mota" class="product__item-input product__item-input--description">
        </li>
        <li class="product__item">
            <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="product__item-input--submit">
        </li>
    </ul>
</div>
</form>