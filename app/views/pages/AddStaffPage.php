<?php
$newDate = date("Y-m-d");
$today = '2000-11-03';


?>

<div class="wrap_form_add_staff">
    <h3 class="form_add_staff_heading">Thêm nhân viên mới</h3>
    <form action="./AddStaff/Add" method="POST" class="form_add">
        <div class="from_avatar">
            <label for="avatar" class="from_add_avatar_lable">
                <img class="img_upload" src="public/img/img-upload.png" alt="">
                <input type="file" class="hidden-input" id="avatar">
                <img class="img_peview" src="https://images.unsplash.com/photo-1661956602153-23384936a1d3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
            </label>
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
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
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
                    <option value="1">Đại học</option>
                    <option value="2">Cao đẳng</option>
                    <option value="3">Cấp 3</option>
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
<script defer src="./public/js/province.js"></script>