<div>
    <h3 class="staff_manage_heading">Theo dõi lương tháng <?= $data['month'] ?></h3>
    <div class="table_staff_manage_search">
        <div class="add_new_staff ">
            <button>
                <a href="HandleExcel/ExportSalary/<?= $data['month'] . '-' . $data['year'] ?>">Xuất file excel</a>
            </button>
            <form class="form_sort_salary" method="POST" action="./Salary/Sort">
                <input type="month" name="date_sort" value="<?= $data['year'] . '-' . $data['month'] ?>">
                <button type="submit">
                    Lọc
                </button>
            </form>
        </div>
    </div>
    <div>
        <table class="table_staff_manage">
            <thead>
                <tr class="table_staff_manage_head">
                    <th class="column1">Ảnh</th>
                    <th class="column2">Tên</th>
                    <th class="column3"> Giới tính</th>
                    <th class="column5">Lương Cứng</th>
                    <th class="column4">Số giờ làm</th>
                    <th class="column6">Tổng Lương</th>
                    <th class="column6">Ngày Lễ</th>
                </tr>
            </thead>
            <tbody class="table_staff_manage_body">
                <?php
                if (!empty($data['staff']))
                    foreach ($data['staff'] as &$row) {
                        $hoursWork = intdiv($row['min'], 60) . 'h' . ($row['min'] % 60);
                        $salaryMonth = calculatorSalary($row['holiday'], $row['min'], $row['luong_cung']);
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
                        <td class="column6">
                            <p><?= number_format($row['luong_cung'], 0, ".", ".") . "đ" ?></p>
                        </td>
                        <td class="column7">
                            <p><?= $hoursWork ?></p>
                        </td>
                        <td class="column7">
                            <p class="success"><?= number_format($salaryMonth, 0, ".", ".") . "đ" ?></p>
                        </td>
                        <td class="column8">
                            <?php PrintDisplay::printShow($row, 'holiday') ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>

            </tbody>
        </table>
    </div>
</div>