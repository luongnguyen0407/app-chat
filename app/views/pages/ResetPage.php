<div class="wrap_from">
    <h3>Điền mã code</h3>
    <form action="./Auth/checkCode" method="POST">
        <div class="one_field">
            <label for="code">Mã code</label>
            <input type="text" id="code" name="code">
        </div>
        <div class="one_field">
            <label for="pass">Mật khẩu mới</label>
            <input type="password" id="pass" name='newpass'>
        </div>
        <div class="one_field">
            <label for="cmnd">Nhập lại mật khẩu mới</label>
            <input type="password" id="cmnd" name='renewpass'>
        </div>
        <button class="global_btn">Nhận mã</button>
        <a href="auth" class="forgot_pass">Login</a>
    </form>
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
