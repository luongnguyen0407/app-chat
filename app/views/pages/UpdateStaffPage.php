<div class="wrap_form_add_staff">
    <h3 class="form_add_staff_heading">Sửa thông tin</h3>
    <form action="./Staff/updateAction/<?= PrintDisplay::printValue($data, 'maNV') ?>" method="POST" class="form_add" enctype="multipart/form-data">
        <div class="from_avatar one_column_input">
            <label for="avatar" class="from_add_avatar_lable">
                <img class="img_upload" src="public/img/img-upload.png" alt="">
                <input type="file" class="hidden-input" id="avatar" name="file_avatar">
                <img class="img_peview" src="./public/img/upload/<?= PrintDisplay::printValue($data, 'hinh_anh') ?>" alt="">
            </label>
            <p style="text-align:center;width: 100%;" class="error_from"><?php PrintDisplay::printError($data, 'file_avatar') ?></p>
        </div>
        <div class="field_form from_name">
            <div class="one_column_input ">
                <label for="name">Họ và tên</label>
                <input class="util_input" type="text" name="name" id="name" value="<?= PrintDisplay::printValue($data, 'ho_ten') || PrintDisplay::printValue($data, 'name') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'name') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="phone">Số điện thoại</label>
                <input class="util_input" type="text" name="phone" id="phone" value="<?= PrintDisplay::printValue($data, 'so_dien_thoai') || PrintDisplay::printValue($data, 'phone') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'phone') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="can_cuoc">Căn cước</label>
                <input class="util_input" type="text" name="can_cuoc" id="can_cuoc" value="<?= PrintDisplay::printValue($data, 'can_cuoc') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'can_cuoc') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="email">Email</label>
                <input class="util_input" type="text" name="email" id="email" value="<?= PrintDisplay::printValue($data, 'email') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'email') ?></p>
            </div>
        </div>
        <div class="field_form from_name">
            <div class="one_column_input ">
                <label for="">Giới tính</label>
                <select name="gender">
                    <?php
                    $arr_gender = [
                        [
                            'value' => 'NAM',
                            'name' => 'Nam'
                        ],
                        [
                            'value' => 'NU',
                            'name' => 'Nữ'
                        ],
                    ];
                    foreach ($arr_gender as &$row) {
                        if ($data['old_value']['gioi_tinh'] == $row['value']) {
                    ?>
                            <option value="<?= $row['value'] ?>" selected><?= $row['name'] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $row['value'] ?>"><?= $row['name'] ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
                <p class="error_from"><?php PrintDisplay::printError($data, 'gender') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="">Phòng ban</label>
                <select name="department">
                    <?php
                    $old_department =  $data['old_value']['maPB'];
                    if (!empty($data['Department'])) {
                        foreach ($data['Department'] as &$row) {
                            if ($row["maPB"] == $old_department) {
                    ?>
                                <option value="<?= $row['maPB'] ?>" selected><?= $row['ten_phong'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?= $row['maPB'] ?>"><?= $row['ten_phong'] ?></option>
                    <?php
                            }
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
                    $old_position =  $data['old_value']['maCV'];
                    if (!empty($data['Position'])) {
                        foreach ($data['Position'] as &$row) {
                            if ($row["maCV"] == $old_position) {
                    ?>
                                <option value="<?= $row['maCV'] ?>" selected><?= $row['ten_chuc_vu'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?= $row['maCV'] ?>"><?= $row['ten_chuc_vu'] ?></option>
                    <?php
                            }
                        }
                    }
                    ?>
                </select>
                <p class="error_from"><?php PrintDisplay::printError($data, 'position') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="birthday">Ngày Sinh</label>
                <input class="util_input" type="date" name="sinh_nhat" id="birthday" value="<?= PrintDisplay::printValue($data, 'ngay_sinh') || PrintDisplay::printValue($data, 'sinh_nhat') ?>">
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
                <input class="util_input" type="text" name="hop_dong_id" id="hopdongid" value="<?= PrintDisplay::printValue($data, 'so_hop_dong') ||  PrintDisplay::printValue($data, 'hop_dong_id') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'hop_dong_id') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="phone">Lương Cứng (VND)</label>
                <input class="util_input" type="text" name="salary" id="salary" value="<?= PrintDisplay::printValue($data, 'luong_cung') || PrintDisplay::printValue($data, 'salary') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'salary') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="date_start">Ngày bắt đầu(Hợp đồng)</label>
                <input class="util_input" type="date" name="date_start" id="date_start" value="<?= PrintDisplay::printValue($data, 'ngay_bat_dau') || PrintDisplay::printValue($data, 'date_start') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'date_start') ?></p>
            </div>
            <div class="one_column_input ">
                <label for="date">Ngày kết thúc(Hợp đồng)</label>
                <input class="util_input" type="date" name="date_end" id="date_end" value="<?= PrintDisplay::printValue($data, 'ngay_ket_thuc') || PrintDisplay::printValue($data, 'date_end') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'date_end') ?></p>
            </div>
        </div>
        <button class="btn_add_staff">Lưu Thông Tin</button>
    </form>
</div>
<script defer src="./public/js/addStaff.js"></script>