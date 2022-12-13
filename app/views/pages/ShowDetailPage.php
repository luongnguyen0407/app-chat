<div class="toast-sendmail">
    <div class="bounce-loading">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="detail_page_main">
    <div class="staff_profile">
        <img src="./public/img/upload/<?php PrintDisplay::printShow($data['staff'], 'hinh_anh') ?>" alt="">
        <div class="staff_profile_content">
            <p class="staff_name">
                <?php PrintDisplay::printShow($data['staff'], 'ho_ten') ?>
            </p>
        </div>
        <button class="global_btn"><a href="Staff/Update/<?php PrintDisplay::printShow($data['staff'], 'maNV') ?>">Sửa thông tin</a></button>
        <button class="global_btn reset_password" data-nv="<?php PrintDisplay::printShow($data['staff'], 'maNV') ?>">Khôi phục mật khẩu </button>
    </div>
    <div class="staff_attendance">
        <div id="calendar_staff">
        </div>
    </div>
</div>
<div class="modal micromodal-slide " id="modal-3" aria-hidden="true">
    <div class="modal__overlay modal_detail_page" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title date_attend list_att_title" id="modal-1-title">
                    Điểm danh ngày 11-12-2022
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <div class="have_attend">
                    <table class="table_modal">
                        <thead>
                            <tr>
                                <th class="column1">Giờ vào</th>
                                <th class="column2">Giờ ra</th>
                                <th class="column3">Ca</th>
                                <th class="column4">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="list_tr_modal">
                        </tbody>
                    </table>
                </div>
                <button class="global_btn btn_add_att">Thêm</button>

            </main>
        </div>
        <div class="modal__container modal__container_edit" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title date_attend" id="modal-1-title">
                    Sửa điểm danh
                </h2>
                <button class="modal__close modal__close_edit" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <div class="have_attend">
                    <form>
                        <div class="one_field">
                            <label for="">Giờ vào làm</label>
                            <input type="text" id="edit_time_start" placeholder="Hour" readonly class="edit_time_start">
                        </div>
                        <div class="one_field">
                            <label for="">Giờ tan làm</label>
                            <input type="text" id="edit_time_end" placeholder="Hour" readonly class="edit_time_end">
                        </div>
                        <div class="one_field">
                            <label for="">Ca</label>
                            <p class="old_ca">CHIEU</p>
                            <span class="wrap_help">
                                <svg class="open_help" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-2 h-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                </svg>
                                <div class="help_timeline">
                                    <p>Ca sáng vào 8h trước 9h</p>
                                    <p>Ca sáng ra 12h trước 13h</p>
                                    <p>Ca chiều vào 13h trước 14h</p>
                                    <p>Ca chiều sau 16h trước 17h</p>
                                </div>
                            </span>
                        </div>
                        <footer class="modal__footer">
                            <button type="button" class="modal__btn modal__btn-primary btn_save_edit">Lưu</button>
                            <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                        </footer>
                    </form>
                </div>
            </main>
        </div>
        <div class="modal__container modal__container_add" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title date_attend" id="modal-1-title">
                    Thêm điểm danh
                </h2>
                <button class="modal__close modal__close_new" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content modal__content2" id="modal-1-content">
                <div class="have_attend">
                    <form>
                        <div class="one_field">
                            <label for="">Giờ vào làm</label>
                            <input type="text" id="time_start_new" name="import_excel" placeholder="Hour" readonly>
                        </div>
                        <div class="one_field">
                            <label for="">Giờ tan làm</label>
                            <input type="text" id="time_end_new" name="import_excel" placeholder="Hour" readonly>
                        </div>
                        <div class="one_field">
                            <label for="">Chọn ca</label>
                            <select name="trinh_do" class="new_ca">
                                <option value="SANG">Sáng</option>
                                <option value="CHIEU">Chiều</option>
                            </select>
                            <span class="wrap_help">
                                <svg class="open_help" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-2 h-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                </svg>
                                <div class="help_timeline">
                                    <p>Ca sáng vào 8h trước 9h</p>
                                    <p>Ca sáng ra 12h trước 13h</p>
                                    <p>Ca chiều vào 13h trước 14h</p>
                                    <p>Ca chiều sau 16h trước 17h</p>
                                </div>
                            </span>
                        </div>
                        <footer class="modal__footer">
                            <button type="button" class="modal__btn modal__btn-primary btn_add_new">Thêm</button>
                            <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
                        </footer>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />
<script src="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<script defer src="./public/js/detailstaff.js"></script>