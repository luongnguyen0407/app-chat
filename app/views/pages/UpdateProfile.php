<div class="detail_page_main">
    <div class="staff_profile">
        <img src="https://source.unsplash.com/random" alt="">
        <div class="staff_profile_content">
            <p class="staff_name">
            </p>
        </div>
        <label for="input_avatar" class="global_btn">
            <input type="file" class="hidden-input" id="input_avatar">
            Thay Avatar
        </label>
    </div>
    <div class="staff_attendance">
        <div id="calendar_staff">
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
                <div class="img_preview">
                </div>
            </main>
            <footer class="modal__footer">
                <button type="submit" class="modal__btn modal__btn-primary btn_crop">Save</button>
                <button class="modal__btn modal__btn_add" data-micromodal-close aria-label="Close this dialog window"><a href="Profile">Thoát</a></button>
            </footer>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.7/cropper.css" integrity="sha512-AuLN6bHjJzqZ+Iw48+GdQPp5uKBdPX6+zWV37ju9zw7XIrevIX01RsLtpTU/zCoQcKrQRPe/EpwDpZiv7OUYMA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.7/cropper.min.js" integrity="sha512-N4T9zTrqZUWCEhVU2uD0m47ADCWYRfEGNQ+dx/lYdQvOn+5FJZxcyHOY68QKsjTEC7Oa234qhXFhjPGQu6vhqg==" crossorigin="anonymous"></script>
<script defer src="./public/js/profile.js"></script>