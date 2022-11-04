<div class="wrap_form_add_staff">
    <h3 class="form_add_staff_heading">Thêm nhân viên mới</h3>
    <h3 class="global_btn btn_open_modal">Nhập bằng file Excel</h3>
    <form action="./AddStaff/Add" method="POST" class="form_add" enctype="multipart/form-data">
        <div class="from_avatar one_column_input">
            <label for="avatar" class="from_add_avatar_lable">
                <img class="img_upload" src="public/img/img-upload.png" alt="">
                <input type="file" class="hidden-input" id="avatar" name="file_avatar">
                <img class="img_peview" src="" alt="">
            </label>
            <p style="text-align:center;width: 100%;" class="error_from"><?php PrintDisplay::printError($data, 'file_avatar') ?></p>
        </div>
        <div class="field_form from_name">
            <div class="one_column_input ">
                <label for="name">Họ và tên</label>
                <input class="util_input" type="text" name="name" id="name" value="<?= PrintDisplay::printValue($data, 'name') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'name') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="phone">Số điện thoại</label>
                <input class="util_input" type="text" name="phone" id="phone" value="<?= PrintDisplay::printValue($data, 'phone') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'phone') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="can_cuoc">Căn cước</label>
                <input class="util_input" type="text" name="can_cuoc" id="can_cuoc" value="<?= PrintDisplay::printValue($data, 'can_cuoc') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'can_cuoc') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="datecc">Ngày cấp</label>
                <input class="util_input" type="date" name="can_cuoc_date" id="datecc" value="<?= PrintDisplay::printValue($data, 'can_cuoc_date') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'can_cuoc_date') ?></p>
            </div>
        </div>
        <div class="field_form from_name">
            <div class="one_column_input ">
                <label for="">Giới tính</label>
                <select name="gender">
                    <option value="Nam">Nam</option>
                    <option value="Nu">Nữ</option>
                </select>
                <p class="error_from"><?php PrintDisplay::printError($data, 'gender') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="">Phòng ban</label>
                <select name="department">
                    <?php
                    if (!empty($data['Department'])) {
                        foreach ($data['Department'] as &$row) {
                    ?>
                            <option value="<?= $row['maPB'] ?>"><?= $row['ten_phong'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <p class="error_from"><?php PrintDisplay::printError($data, 'department') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="">Chức vụ</label>
                <select name="position">
                    <?php
                    if (!empty($data['Position'])) {
                        foreach ($data['Position'] as &$row) {
                    ?>
                            <option value="<?= $row['maCV'] ?>"><?= $row['ten_chuc_vu'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <p class="error_from"><?php PrintDisplay::printError($data, 'position') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="birthday">Ngày Sinh</label>
                <input class="util_input" type="date" name="sinh_nhat" id="birthday" value="<?= PrintDisplay::printValue($data, 'sinh_nhat') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'sinh_nhat') ?></p>
            </div>
        </div>
        <div class="field_form from_name">
            <div class="one_column_input wrap_list_pr1 input_province" data-parent=1>
                <label for="province">Thành phố</label>
                <input class="util_input" type="text" name="thanh_pho" id="province" readonly="readonly" value="<?= PrintDisplay::printValue($data, 'thanh_pho') ?>">
                <ul class="list_province scroll_style">
                </ul>
                <p class="error_from"><?php PrintDisplay::printError($data, 'thanh_pho') ?></p>
            </div>
            <div class="one_column_input wrap_list_pr2 input_province" data-parent=2>
                <label for="district">Huyện </label>
                <input class="util_input" type="text" name="huyen" id="phone" readonly="readonly" value="<?= PrintDisplay::printValue($data, 'huyen') ?>">
                <ul class="list_province scroll_style">
                </ul>
                <p class="error_from"><?php PrintDisplay::printError($data, 'huyen') ?></p>
            </div>
            <div class="one_column_input wrap_list_pr3 input_province" data-parent=3>
                <label for="ward">Xã</label>
                <input class="util_input" type="text" name="xa" id="ward" readonly="readonly" value="<?= PrintDisplay::printValue($data, 'xa') ?>">
                <ul class="list_province scroll_style">
                </ul>
                <p class="error_from"><?php PrintDisplay::printError($data, 'xa') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="">Trình độ</label>
                <select name="trinh_do">
                    <option value="DH">Đại học</option>
                    <option value="CD">Cao đẳng</option>
                    <option value="C3">Cấp 3</option>
                </select>
                <p class="error_from"><?php PrintDisplay::printError($data, 'trinh_do') ?></p>
            </div>
        </div>
        <div class="field_form from_name">
            <div class="one_column_input ">
                <label for="name">Số hợp đồng</label>
                <input class="util_input" type="text" name="hop_dong_id" id="hopdongid" value="<?= PrintDisplay::printValue($data, 'hop_dong_id') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'hop_dong_id') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="phone">Lương Cứng (VND)</label>
                <input class="util_input" type="text" name="salary" id="salary" value="<?= PrintDisplay::printValue($data, 'salary') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'salary') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="date_start">Ngày bắt đầu(Hợp đồng)</label>
                <input class="util_input" type="date" name="date_start" id="date_start" value="<?= PrintDisplay::printValue($data, 'date_start') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'date_start') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="date">Ngày kết thúc(Hợp đồng)</label>
                <input class="util_input" type="date" name="date_end" id="date_end" value="<?= PrintDisplay::printValue($data, 'date_end') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'date_end') ?></p>
            </div>
        </div>
        <button class="btn_add_staff">Thêm Nhân Viên</button>
    </form>
</div>
<div class="modal micromodal-slide" id="modal-3" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Nhập File Excel
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <button class="global_btn"><a href="./public/template/nhap_nhan_vien_mau.xlsx">Tải mẫu Excel</a></button>
                <form action="./HandleExcel/Import" class="form_modal_excel" enctype="multipart/form-data" method="post">
                    <label for="">Chọn file upload</label>
                    <input type="file" name="import_excel">
                    <footer class="modal__footer">
                        <button type="submit" class="modal__btn modal__btn-primary btn_save">Save</button>
                        <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                    </footer>
                </form>
            </main>
        </div>
    </div>
</div>

<?php
if (!empty($data['status'])) {
?>
    <script>
        Toastify({
            text: "Thêm nhân viên thành công",
            className: "Toast_success",
            duration: 3000,
            background: "#07bc0c",
            // #e74c3c
        }).showToast();
    </script>
<?php
}
?>

<script defer src="./public/js/addStaff.js"></script>