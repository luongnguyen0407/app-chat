//handle modal
const btnOpen = document.querySelector(".btn_open_modal");
const btnClose = document.querySelector(".modal__close");
const inputPass = document.querySelector("#cmnd-reset");
const submitResetPass = document.querySelector(".btn_send_code");
const modal = document.querySelector("#modal-3");
btnOpen.addEventListener("click", () => {
  modal.classList.add("is-open");
  modal.setAttribute("aria-hidden", "false");
});
btnClose.addEventListener("click", () => {
  modal.classList.remove("is-open");
  modal.setAttribute("aria-hidden", "true");
});

inputPass.addEventListener("keyup", () => {
  if (inputPass.value) {
    submitResetPass.removeAttribute("disabled");
  } else {
    submitResetPass.setAttribute("disabled", true);
  }
});
