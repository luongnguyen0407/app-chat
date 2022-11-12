<?php
// PrintDisplay::printFix($data['staff']);
?>
<div>
    <h3 class="staff_manage_heading">Danh sách nhân viên</h3>
    <div class="table_staff_manage_search">
        <div class="add_new_staff">
            <button>
                <a href="AddStaff">Thêm nhân viên</a>
            </button>
            <button>
                <a href="HandleExcel/Export">Xuất file excel</a>
            </button>
        </div>
        <div class="table_staff_manage_search_input">
            <input type="text" placeholder="Search....">
            <div class="search_icon">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.16669 0.666626C12.3067 0.666626 15.6667 4.02663 15.6667 8.16663C15.6667 12.3066 12.3067 15.6666 8.16669 15.6666C4.02669 15.6666 0.666687 12.3066 0.666687 8.16663C0.666687 4.02663 4.02669 0.666626 8.16669 0.666626ZM8.16669 14C11.3892 14 14 11.3891 14 8.16663C14 4.94329 11.3892 2.33329 8.16669 2.33329C4.94335 2.33329 2.33335 4.94329 2.33335 8.16663C2.33335 11.3891 4.94335 14 8.16669 14ZM15.2375 14.0591L17.595 16.4158L16.4159 17.595L14.0592 15.2375L15.2375 14.0591Z" fill="#1F4173" />
                </svg>
            </div>
        </div>
    </div>
    <div>
        <table class="table_staff_manage">
            <thead>
                <tr class="table_staff_manage_head">
                    <th class="column1">Ảnh</th>
                    <th class="column2">Tên</th>
                    <th class="column3"> Giới tính</th>
                    <th class="column4">Căn cước</th>
                    <th class="column5">Điện thoại</th>
                    <th class="column6">Ngày sinh</th>
                    <th class="column7">Phòng ban</th>
                    <th class="column7">Hợp Đồng</th>
                    <th class="column7">Thao tác</th>
                </tr>
            </thead>
            <tbody class="table_staff_manage_body">
                <?php
                if (!empty($data['staff'])) {
                    $today = date("Y-m-d");
                    foreach ($data['staff'] as &$row) {
                ?>
                        <tr>
                            <td class="column1">
                                <img src="./public/img/upload/<?php PrintDisplay::printShow($row, 'hinh_anh') ?>" alt="">
                            </td>
                            <td class="column2">
                                <p><?php PrintDisplay::printShow($row, 'ho_ten') ?></p>
                            </td>
                            <td class="column3">
                                <p><?php PrintDisplay::printShow($row, 'gioi_tinh') ?></p>
                            </td>
                            <td class="column4">
                                <p><?php PrintDisplay::printShow($row, 'can_cuoc') ?></p>
                            </td>
                            <td class="column5">
                                <p><?php PrintDisplay::printShow($row, 'so_dien_thoai') ?></p>
                            </td>
                            <td class="column6">
                                <p><?php PrintDisplay::printShow($row, 'ngay_sinh') ?></p>
                            </td>
                            <td class="column7">
                                <p><?php PrintDisplay::printShow($row, 'ten_phong') ?></p>
                            </td>
                            <td class="column7">
                                <?php

                                if ($row['ngay_ket_thuc'] < $today) {
                                ?>
                                    <p class="danger">Hết hạn</p>
                                <?php
                                } else {
                                ?>
                                    <p class="success">Đang làm</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td class="column8">
                                <a href="" class="action_update">Sửa</a>
                                <a href="ListStaff/viewDetails/<?php PrintDisplay::printShow($row, 'maNV') ?>" class="action_del">Xem</a>
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </div>
</div>