document.addEventListener("DOMContentLoaded", function () {
  function getData() {
    $.ajax({
      url: "./Attendance/getCalendarAttendance",
      method: "POST",
      success: function (res) {
        const data = JSON.parse(res);
        //   if (!data || data.length <= 0) return;
        let ev = [];
        data.forEach((day) => {
          ev.push({
            title: `${day["gio_vao"]}-${day["gio_ra"] || "Vắng"}`,
            start: `${day["ngay_cham"]}`,
            backgroundColor: `${
              day["gio_ra"] && day["gio_vao"] ? "#16c35b" : "#e80000"
            }`,
            // display: "background",
          });
        });
        createCalendar(ev);
      },
    });
  }
  getData();
  function createCalendar(ev) {
    const event = ev;
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
      validRange: {
        end: "2022-12-30",
      },
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth",
      },
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      events: event,
    });
    calendar.render();
  }

  $.ajax({
    url: "./Attendance/getTotalWork",
    method: "POST",
    success: function (res) {
      const data = JSON.parse(res);
      if (data && data.length > 0) {
        let totalMin = 0;
        data.forEach((item) => {
          totalMin += +item["totalMin"];
        });
        const hours = totalMin / 60;
        const rhours = Math.floor(hours);
        const minutes = (hours - rhours) * 60;
        const rminutes = Math.round(minutes);
        $(".total_time_work").text(`${rhours}h${rminutes}p`);
      }
      //   if (!data || data.length <= 0) return;
    },
  });
});
