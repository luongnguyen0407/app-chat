<div class="detail_page_main">
    <div class="staff_profile">
        <img src="./public/img/upload/<?php PrintDisplay::printShow($data['staff'], 'hinh_anh') ?>" alt="">
        <div class="staff_profile_content">
            <p class="staff_name">
            </p>
        </div>
        <label for="input_avatar" class="global_btn">
            <input type="file" class="hidden-input" id="input_avatar">
            Thay Avatar
        </label>
        <button class="global_btn update_pass">Cập nhật mật khẩu</button>
    </div>
    <div class="staff_attendance">
        <div id="info_staff">
            <div class="one_column_input ">
                <label for="name">Họ Và Tên</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'ho_ten') ?>">
            </div>
            <div class="one_column_input ">
                <label for="phone">Số Điện Thoại</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'so_dien_thoai') ?>">
            </div>
            <div class="one_column_input ">
                <label for="can_cuoc">Căn Cước</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'can_cuoc') ?>">
            </div>
            <div class="one_column_input ">
                <label for="email">Email</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'email') ?>">
            </div>
            <div class="one_column_input ">
                <label for="birthday">Ngày Sinh</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'ngay_sinh') ?>">
            </div>
            <div class="one_column_input ">
                <label for="address">Địa Bhỉ</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'dia_chi') ?>">
            </div>
            <div class="one_column_input ">
                <label for="department">Phòng Ban</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'maPB') ?>">
            </div>
            <div class="one_column_input ">
                <label for="department">Lương</label>
                <input readonly type="text" value="<?= number_format($data['staff']['luong_cung'], 0, ".", ".") . "đ" ?>">
            </div>
            <div class="one_column_input ">
                <label for="day_start">Ngày Kí Hợp Đồng</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'ngay_bat_dau') ?>">
            </div>
            <div class="one_column_input ">
                <label for="birthday">Ngày Kết Thúc Hợp Đồng</label>
                <input readonly type="text" value="<?= PrintDisplay::printShow($data['staff'], 'ngay_ket_thuc') ?>">
            </div>
        </div>
    </div>
</div>
<div class="modal micromodal-slide" id="modal-3" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container modal__content4" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Cắt ảnh
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class=" modal__content6" id="modal-1-content">
                <div class="wrap_img">
                    <img id="img_crop" class="image_avatar_crop" src="./public/img/upload/photo-def.1668326701.jpg" alt="">
                </div>
                <div>
                    <div class="img_preview">
                    </div>
                    <footer class="modal__footer">
                        <button type="submit" class="modal__btn modal__btn-primary btn_crop">Save</button>
                        <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                    </footer>
                </div>
            </main>
        </div>
    </div>
</div>
<div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Đổi Mật Khẩu
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <form action="" class="form_modal_pass">
                    <div>
                        <label for="">Nhập mật khẩu cũ</label>
                        <input type="password" class="passOld">
                    </div>
                    <div>
                        <label for="">Nhập mật khẩu mới</label>
                        <input type="password" class="passNew">
                    </div>
                    <div>
                        <label for="">Nhập lại mật khẩu mới</label>
                        <input type="password" class="passNewRef">
                    </div>
                    <footer class="modal__footer">
                        <button type="submit" class="modal__btn modal__btn-primary btn_save">Lưu</button>
                        <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                    </footer>
                </form>
            </main>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.7/cropper.css" integrity="sha512-AuLN6bHjJzqZ+Iw48+GdQPp5uKBdPX6+zWV37ju9zw7XIrevIX01RsLtpTU/zCoQcKrQRPe/EpwDpZiv7OUYMA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.7/cropper.min.js" integrity="sha512-N4T9zTrqZUWCEhVU2uD0m47ADCWYRfEGNQ+dx/lYdQvOn+5FJZxcyHOY68QKsjTEC7Oa234qhXFhjPGQu6vhqg==" crossorigin="anonymous"></script>
<script defer src="./public/js/profile.js"></script>