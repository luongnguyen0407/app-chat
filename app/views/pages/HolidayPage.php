<section class="wrap_department">
    <div class="form_add_department_wrap">
        <h3 class="from_add_department_heading">Thêm ngày nghỉ</h3>
        <form action="./Holiday/createHoliday" class="form_add_department" method="POST">
            <div class="one_field">
                <label for="date">Chọn ngày</label>
                <input name="date" type="date" id="date" class="maPb" value="<?= PrintDisplay::printValue($data, 'date') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'date') ?></p>
            </div>
            <div class="one_field">
                <label for="">Tên Ngày Nghỉ</label>
                <input name="name_holiday" type="text" id="name_department" placeholder="Tên ngày nghỉ" class="name_department" value="<?= PrintDisplay::printValue($data, 'name_holiday') ?>">
                <p class="error_from"><?php PrintDisplay::printError($data, 'name_holiday') ?></p>
            </div>
            <button class="global_btn">Thêm Ngày Nghỉ</button>
        </form>
    </div>
    <div class="list_department hide_scroll">
        <table class="table ">
            <thead class="list_department_header">
                <tr>
                    <th>Ngày Nghỉ</th>
                    <th>Tên Ngày Nghỉ</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody class="list_department_show">

            </tbody>

        </table>
    </div>
</section>
<div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Cập nhật
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <form action="" class="form_modal_pass">
                    <div>
                        <label>Ngày Nghỉ</label>
                        <input type="date" class="holiday_new">
                    </div>
                    <div>
                        <label for="">Tên Ngày Nghỉ</label>
                        <input type="text" class="name_holiday_new">
                    </div>
                    <footer class="modal__footer">
                        <button type="button" class="modal__btn modal__btn-primary btn_save">Lưu</button>
                        <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                    </footer>
                </form>
            </main>
        </div>
    </div>
</div>
<script defer src="./public/js/holiday.js"></script>