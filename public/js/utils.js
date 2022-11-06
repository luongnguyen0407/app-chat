$(window).on("load", function () {
  $(".loading_main").hide();
  const today = new Date();
  const curHr = today.getHours();
  const time = curHr < 12 ? "Morning" : curHr < 18 ? "Afternoon" : "Evening";
  $(".welcome").text(`Have a good ${time} `);
  (function currentTime() {
    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    hh = hh < 10 ? "0" + hh : hh;
    mm = mm < 10 ? "0" + mm : mm;
    ss = ss < 10 ? "0" + ss : ss;
    let time = hh + ":" + mm + ":" + ss;
    $(".now_time").text(time);
    let t = setTimeout(function () {
      currentTime();
    }, 1000);
  })();
});
