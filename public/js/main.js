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
console.log(window.location.pathname);

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
