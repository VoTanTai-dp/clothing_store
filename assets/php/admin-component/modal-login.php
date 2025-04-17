<style>
    .auth-form__switch-button a {
        text-decoration: none;
    }

    .auth-form__controls-back a {
        text-decoration: none;
    }
</style>

<!-- Modal layout dùng cho form Đăng ký/Đăng nhập-->
<div class="modal">
    <div class="modal__overlay"></div>

    <div class="modal__body">
        <!-- Login form -->
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class="auth-form__switch-button"><a href="index.php?action=register">Đăng ký</a></span>
                </div>
                <form action="index.php?action=login" method="post">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" name="email" class="auth-form__input" placeholder="Nhập Email">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="pass" class="auth-form__input" placeholder="Nhập mật khẩu">
                        </div>

                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                            <span class="auth-form__help-separate"></span>
                            <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn btn--normal auth-form__controls-back"><a href="index.php">TRỞ LẠI</a></button>
                        <button type="submit" name="login" class="btn btn--primary">ĐĂNG NHẬP</button>
                    </div>
                </form>
            </div>

            <div class="auth-form__socials">
                <a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                    <i class="auth-form__socials-icon fa-brands fa-square-facebook"></i>
                    <span class="auth-form__socials-title">Đăng nhập Facebook</span>
                </a>

                <a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                    <i class="auth-form__socials-icon fa-brands fa-google"></i>
                    <span class="auth-form__socials-title">Đăng nhập Google</span>
                </a>
            </div>
        </div>
    </div>
</div>