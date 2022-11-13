document.addEventListener("DOMContentLoaded", function () {
  const modal = document.querySelector("#modal-3");
  let listEvent = [];
  const queryString = window.location.pathname;
  let idStaff = queryString.match(/\d+/);
  idStaff = idStaff[0];

  //handle get att
  function getData() {
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
        getDataByDay(info.dateStr);
        $(".list_att_title").text(`Điểm danh ngày ${info.dateStr}`);
      },
    });
    calendar.render();
  }

  function getDataByDay(day) {
    $.ajax({
      url: "./Attendance/getCalendarByDay",
      method: "POST",
      data: {
        day,
        id: idStaff,
      },
      success: function (res) {
        const data = JSON.parse(res);
        modal.classList.add("is-open");
        modal.setAttribute("aria-hidden", "false");
        $(".list_tr_modal").text("");
        if (!data || data.length <= 0) return;
        listEvent = data;
        let flag = 0;
        data.forEach((item) => {
          const template = `
          <tr>
          <td class="column1">${item.gio_vao}</td>
          <td class="column2">${item.gio_ra}</td>
          <td class="column3">${item.maCA}</td>
          <td class="column4" data-index = ${flag}>Sửa</td>
      </tr>
          `;
          $(".list_tr_modal").append(template);
          flag++;
        });
      },
    });
  }

  $(document).on("click", "tbody .column4", function () {
    $(".modal__container_edit").show();
    const index = this.dataset.index;
    $(".edit_time_start").val(listEvent[index].gio_vao);
    $(".old_ca").text(listEvent[index].maCA);
    $(".edit_time_end").val(listEvent[index].gio_ra);
    $(".btn_save_edit").data("id", listEvent[index].maBC);
  });

  $(".btn_save_edit").click(() => {
    const timeStart = $(".edit_time_start").val();
    const timeEnd = $(".edit_time_end").val();
    const id = $(".btn_save_edit").data("id");
    $.ajax({
      url: "./Attendance/handleUpdate",
      method: "POST",
      data: {
        timeStart,
        timeEnd,
        id,
      },
      success: function (res) {
        if (res === "ok") {
          CreateToast("Sửa thành công");
          getData();
          let day = getDayFromHeader();
          if (!day) return;
          day = day[0];
          getDataByDay(day.trim());
        }
      },
    });
  });
  $(".btn_add_new").click(() => {
    const selectValue = $(".new_ca option:selected").val();
    const timeStart = $("#time_start_new").val();
    const timeEnd = $("#time_end_new").val();
    const day = getDayFromHeader();
    //return when invalid value
    if (
      !selectValue ||
      !timeStart ||
      !timeEnd ||
      !day[0] ||
      timeStart === "00:00:00" ||
      timeEnd === "00:00:00"
    ) {
      CreateToast("Invalid Value");
      return;
    }

    $.ajax({
      url: "./Attendance/updateAttendanceByAdmin",
      method: "POST",
      data: {
        timeStart,
        timeEnd,
        day: day[0],
        timeLine: selectValue,
        uid: idStaff,
      },
      success: function (res) {
        if (res === "ok") {
          CreateToast("Thêm thành công");
          getData();
          getDataByDay(day[0].trim());
          $(".modal__container_add").hide();
        }
      },
    });
  });

  //input time format 24h
  const timepicker = new TimePicker(
    ["edit_time_start", "edit_time_end", "time_start_new", "time_end_new"],
    {
      lang: "en",
      theme: "blue",
    }
  );
  timepicker.on("change", function (evt) {
    const value =
      (evt.hour = evt.hour < 10 ? "0" + evt.hour : evt.hour || "00") +
      ":" +
      (evt.minute || "00") +
      ":00";
    evt.element.value = value;
  });

  //create toast
  function CreateToast(message) {
    Toastify({
      text: message,
      className: "Toast_success",
      duration: 3000,
      background: "#07bc0c",
      // #e74c3c
    }).showToast();
  }

  //get day from header

  function getDayFromHeader() {
    const stringDay = $(".modal__title.date_attend").text();
    let day = stringDay.match(/\d{4}-\d{2}-\d{2}/);
    return day;
  }
  //handle modal

  const btnClose = document.querySelector(".modal__close");

  $(".modal__close_edit").click(function () {
    $(".modal__container_edit").hide();
  });
  $(".modal__close_new").click(function () {
    $(".modal__container_add").hide();
  });
  $(".btn_add_att").click(() => {
    $(".modal__container_add").show();
  });

  btnClose.addEventListener("click", () => {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    $(".modal__container_edit").hide();
    $(".modal__container_add").hide();
  });
});
