$(window).ready(() => {
  let uId = 0;
  $(".action_salary").click(function () {
    $("#modal-6").addClass("is-open");
    $("#modal-6").attr("aria-hidden", "false");
    const today = new Date();
    const currentTime = `${today.getFullYear()}-${today.getMonth() + 1}`;
    $(".input-month").val(currentTime);
    uId = $(this).data("nv");
    $(".btn_detail a").attr("href", `Staff/viewDetails/${uId}`);
    getSalary(currentTime);
  });

  function getSalary(currentDate) {
    $(".modal__title").text(`Lương tháng ${currentDate.split("-")[1]}`);
    $.ajax({
      url: "./Salary/calculatorSalary",
      method: "POST",
      data: {
        currentDate,
        uId,
      },
      success: function (res) {
        const data = JSON.parse(res);
        const hours = data.totalMin / 60;
        const rhours = Math.floor(hours);
        const minutes = (hours - rhours) * 60;
        const rminutes = Math.round(minutes);
        $(".hour_work").text(`${rhours}h${rminutes}p`);
        $(".salary").text(formatPrice(data.salary) + "đ");
        $(".salary_month").text(formatPrice(data.monthSalary) + "đ");
        $(".holiday_month").text(data.holiday);
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
  function formatPrice(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  }
});
