document.addEventListener("DOMContentLoaded", function () {
  const timepicker = new TimePicker(["time_start", "time_end"], {
    lang: "en",
    theme: "blue",
  });
  timepicker.on("change", function (evt) {
    const value = (evt.hour || "00") + ":" + (evt.minute || "00");
    evt.element.value = value;
  });
  function getData() {
    const queryString = window.location.pathname;
    let idStaff = queryString.match(/\d+/);
    if (!idStaff) return;
    idStaff = idStaff[0];
    $.ajax({
      url: "./Attendance/getCalendarByAdmin",
      method: "POST",
      data: {
        id: idStaff,
      },
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
    var calendarEl = document.getElementById("calendar_staff");
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
      dateClick: function (info) {
        console.log(info.dateStr);
      },
    });
    calendar.render();
  }

  //handle modal
  const btnClose = document.querySelector(".modal__close");
  const modal = document.querySelector("#modal-3");
  btnClose.addEventListener("click", () => {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
  });
});
