<section class="attendance">
    <div class="profile_user">
        <div class="profile_avatar">
            <img src="./public/img/upload/<?= PrintDisplay::printShow($data['profile'], 'hinh_anh') ?>" alt="">
            <p><?= PrintDisplay::printShow($data['profile'], 'ho_ten') ?></p>
            <p><?= PrintDisplay::printShow($data['profile'], 'ten_chuc_vu') ?></p>
        </div>
        <div class="attendance_time">
            <form action="./Attendance/addAttendance" method="POST">
                <button class="global_btn">Điểm danh ngay</button>
            </form>
            <div>
                <h3 class="total_time_work">0h</h3>
                <p>Total work for month</p>
            </div>
        </div>
    </div>
    <div class="warp_calendar">
        <div id='calendar'></div>
    </div>
</section>
<?php
if (!empty($data['status'])) {
?>
    <script>
        Toastify({
            text: "<?= $data['status'] ?>",
            className: "Toast_success",
            duration: 3000,
            background: "#07bc0c",
            // #e74c3c
        }).showToast();
    </script>
<?php
}
?>
<script defer src="./public/js/calendar.js"></script>