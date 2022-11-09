document.addEventListener("DOMContentLoaded", function () {
  function getData() {
    $.ajax({
      url: "./Attendance/getCalendarAttendance",
      method: "POST",
      success: function (res) {
        const data = JSON.parse(res);
        //   if (!data || data.length <= 0) return;
        console.log(data);
        let ev = [];
        data.forEach((day) => {
          const check =
            day["gio_ra"] < "16:00:00"
              ? false
              : day["gio_vao"] > "7:00:00"
              ? false
              : true;
          ev.push({
            title: `${day["gio_vao"]}-${day["gio_ra"] || "Con som"}`,
            start: `${day["ngay_cham"]}`,
            backgroundColor: `${check ? "#16c35b" : "#e80000"}`,
            display: "background",
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
});
