document.addEventListener("DOMContentLoaded", function () {
  let month = new Date().getMonth() + 1;
  function getData(month) {
    $.ajax({
      url: "./Attendance/getCalendarAttendance",
      method: "POST",
      data: {
        month,
      },
      success: function (res) {
        const data = JSON.parse(res);
        //   if (!data || data.length <= 0) return;
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
  getData(month);
  function createCalendar(ev, start) {
    let today = new Date();
    console.log(today.toISOString().split("T")[0]);
    const event = ev;
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
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
    document
      .querySelector(".fc-prev-button")
      .addEventListener("click", function () {
        console.log(calendar.getDate().getMonth() + 1);
        getData(calendar.getDate().getMonth() + 1);
      });
  }
});
