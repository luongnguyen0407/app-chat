$(window).ready(() => {
  let uId = 0;
  $(".action_salary").click(function () {
    $("#modal-6").addClass("is-open");
    $("#modal-6").attr("aria-hidden", "false");
    const today = new Date();
    const currentTime = `${today.getFullYear()}-${today.getMonth() + 1}`;
    $(".input-month").val(currentTime);
    uId = $(this).data("nv");
    getSalary(currentTime);
  });

  function getSalary(currentDate) {
    $.ajax({
      url: "./Salary/calculatorSalary",
      method: "POST",
      data: {
        currentDate,
        uId,
      },
      success: function (res) {
        const data = JSON.parse(res);
        console.log(data);
        const minHoliday = 8 * 60 * +data.holiday; //work 8h for day
        const totalMinWork = +data.totalMin + minHoliday;
        const salaryOfMin = +data.salary / (20 * 8 * 60); // 20 day work, 8h of day, 60 min
        console.log(salaryOfMin * totalMinWork);
      },
      error: function () {
        swal("Server error", "Server Error 500", "error");
      },
    });
  }

  $(".modal__close").click(function () {
    $("#modal-6").removeClass("is-open");
    $("#modal-6").attr("aria-hidden", "true");
  });
  $(".input-month").change(function () {
    getSalary(this.value);
  });
});
