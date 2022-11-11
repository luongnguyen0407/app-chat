<section class="attendance">
    <div class="profile_user">
        <div class="profile_avatar">
            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="">
            <p>Trưởng Phòng </p>
        </div>
        <div class="attendance_time">
            <form action="./Attendance/addAttendance" method="POST">
                <button class="global_btn">Chấm công hôm nay</button>
            </form>
            <div>
                <h3 class="total_time_work">3h28p</h3>
                <p>Total work for month</p>
            </div>
        </div>
    </div>
    <div class="warp_calendar">
        <div id='calendar'></div>
    </div>
</section>
<script defer src="./public/js/calendar.js"></script>