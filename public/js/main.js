const showDrop = document.querySelector(".nav_profile_show");
const dropDow = document.querySelector(".dropdown-menu");
const sideBarList = document.querySelectorAll(".side_bar_item");
switch (window.location.pathname) {
  case "/quanlynhanvien/ListStaff":
    sideBarList[1].classList.add("active");
    break;
  case "/quanlynhanvien/Dashboard":
    sideBarList[0].classList.add("active");
    break;
  default:
    break;
}

$(".nav_profile_show").click(function () {
  $(".dropdown-menu")
    .toggleClass("show")
    .height(`${$(".dropdown-menu")[0].scrollHeight}px`);
  if (!dropDow.classList.contains("show")) {
    dropDow.style.height = "0px";
  }
});

window.addEventListener("click", (e) => {
  if (!dropDow.contains(e.target) && !e.target.matches(".nav_profile_show")) {
    dropDow.classList.remove("show");
    dropDow.style.height = "0px";
  }
});

$(document).ready(function () {
  let status = localStorage.getItem("side_bar") || "false";
  status = $.parseJSON(status.toLowerCase());
  if (status) {
    $(".side_bar").addClass("side_zoom");
    localStorage.setItem("side_bar", status);
  }
  $(".control_sidebar").click(function () {
    let status = localStorage.getItem("side_bar");
    status = $.parseJSON(status.toLowerCase());
    $(".side_bar").toggleClass("side_zoom");
    localStorage.setItem("side_bar", !status);
  });
});
