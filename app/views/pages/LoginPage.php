<div class="wrap_from">
    <h3>Đăng nhập</h3>
    <form action="./Auth/Login" method="POST">
        <div class="one_field">
            <label for="cmnd">Số căn cước</label>
            <input type="text" id="cmnd" name="cmnd_login">
        </div>
        <div class="one_field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <button class="global_btn">Đăng nhập</button>
        <p class="forgot_pass btn_open_modal">Forgot Password?</p>
    </form>
</div>
<div class="modal micromodal-slide" id="modal-3" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Công ty
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <div class="wrap_from">
                    <h3>Khôi phục mật khẩu</h3>
                    <form action="./auth/ResetPass" method="POST">
                        <div class="one_field">
                            <label for="cmnd-reset">Số căn cước</label>
                            <input type="text" id="cmnd-reset" name="can_cuoc">
                        </div>
                        <button type="submit" class="global_btn btn_send_code" disabled>Nhận mã</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>
<?php
if (!empty($data['error'])) {
?>
    <script>
        Toastify({
            text: "<?= $data['error'] ?>",
            className: "Toast_success",
            duration: 3000,
            background: "#07bc0c",
            // #e74c3c
        }).showToast();
    </script>
<?php
}
