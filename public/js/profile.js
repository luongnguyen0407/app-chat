$(document).ready(function () {
  const modal = document.querySelector("#modal-3");
  const image = document.getElementById("img_crop");
  let file;
  let reader;
  let cropper;

  $("#input_avatar").change(function () {
    let fileImg = this.files;
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    var done = function (url) {
      image.src = url;
    };

    if (fileImg && fileImg.length > 0) {
      file = fileImg[0];
      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }

    cropper = new Cropper(image, {
      aspectRatio: 0,
      viewMode: 2,
      preview: ".img_preview",
    });
  });
  $(".modal__close").click(function () {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    cropper.destroy();
    cropper = null;
  });

  $(".btn_crop").click(function () {
    canvas = cropper.getCroppedCanvas({
      width: 500,
      height: 700,
    });

    canvas.toBlob(function (blob) {
      url = URL.createObjectURL(blob);
      var reader = new FileReader();
      reader.readAsDataURL(blob);
      reader.onloadend = function () {
        var base64data = reader.result;
        $.ajax({
          url: "./Ajax/updateAvatarBase64",
          method: "POST",
          data: { image: base64data },
          success: function (data) {
            if (data === "ok") {
              location.reload();
            } else {
              Toastify({
                text: "Lỗi",
                className: "Toast_success",
                duration: 3000,
                background: "#e74c3c",
              }).showToast();
            }
          },
        });
      };
    });
  });
});
