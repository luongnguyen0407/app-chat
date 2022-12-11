$(window).ready(function () {
  function getData() {
    $.ajax({
      url: "./Ajax/getDepartment",
      method: "GET",
      success: function (data) {
        const res = JSON.parse(data);
        if (res.length > 0) {
          $(".list_department_show").text("");
          res.forEach((item) => {
            const template = `<tr>
            <td class="id_department">${item.maPB}</td>
            <td class="name_department">${item.ten_phong}</td>
            <td>
                <div class="wrap_active" data-id="${item.maPB}">
                    <span style="color: red;" class="action_remove">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-2 h-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </span>
                    <span class="update-department">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </span>
                </div>
            </td>
        </tr>`;
            $(".list_department_show").append(template);
          });
        }
      },
    });
  }
  getData();

  $(document).on("click", ".action_remove", function () {
    const id = $(this).parent().data("id");
    if (!id) return;
    swal({
      title: "Xóa Phòng Ban Này",
      text: "Việc này có thể khiến các nhân viên phòng này bị NULL",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "./Department/deleteDepartment",
          method: "POST",
          data: {
            id,
          },
          success: function () {
            swal("Xóa thành công", {
              icon: "success",
            });
            getData();
          },
          error: function () {
            swal("Đang có nhân viên thuộc phòng ban này", {
              icon: "error",
            });
          },
        });
      }
    });
  });
  $(document).on("click", ".update-department", function () {
    $("#modal-4").addClass("is-open");
    $("#modal-4").attr("aria-hidden", "false");
    const parent = this.closest("tr");
    const idDep = parent.querySelector(".id_department").textContent;
    const nameDep = parent.querySelector(".name_department").textContent;
    $(".id_pb_new").val(idDep);
    $(".name_pb_new").val(nameDep);
    const id = $(this).parent().data("id");
    $(".btn_save").data("id", id);
  });
  $(".btn_save").click(function () {
    const id = $(".btn_save").data("id");
    if (!id) {
      swal("Thiếu id", {
        icon: "error",
      });
      return;
    }
    const idNew = $(".id_pb_new").val();
    const nameNew = $(".name_pb_new").val();
    if (!idNew || !nameNew || idNew.length > 5) {
      swal("Dữ liệu không phù hợp", {
        icon: "error",
      });
      return;
    }
    $.ajax({
      url: "./Ajax/updateDepartment",
      method: "POST",
      data: {
        id,
        idNew,
        nameNew,
      },
      success: function () {
        swal("Cập nhật thành công", {
          icon: "success",
        });
        getData();
        $("#modal-4").removeClass("is-open");
        $("#modal-4").attr("aria-hidden", "true");
      },
      error: function () {
        swal("Lỗi kết nối", {
          icon: "error",
        });
      },
    });
  });
  $(".modal__close").click(function () {
    $("#modal-4").removeClass("is-open");
    $("#modal-4").attr("aria-hidden", "true");
  });
});
