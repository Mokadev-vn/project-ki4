const URL = "http://localhost/project-ki4/";
$(document).ready(function () {
  $("#login").click(function () {
    let csrf_token = $(".csrf_token").val();
    let username = $("#loginEmail").val();
    let password = $("#loginPassword").val();

    let data = {
      csrf_token,
      username,
      password,
    };

    $("#error-loginEmail").html("");
    $("#error-loginPassword").html("");
    $("#message-login").html("");

    postData("login", data).then(function (data) {
      if (data.status == "success") {
        window.location.href =
          data.role == 3 ? URL + "admin" : URL + "dashboard";
      }
    });
  });

  $("#register").click(function () {
    let csrf_token = $(".csrf_token").val();
    let fullname = $("#fullname").val();
    let phone = $("#phone").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let role = $("#role").val();
    let check = $("#check")[0];

    let data = {
      csrf_token,
      fullname,
      phone,
      email,
      password,
      role,
    };

    $("#error-fullname").html("");
    $("#error-phone").html("");
    $("#error-email").html("");
    $("#error-password").html("");
    $("#message-register").html("");
    $("#error-check").html("");
    if (!check.checked) {
      $("#error-check").text("Please check input");
      return;
    }

    postData("register", data).then(function (data) {
      if (data.status === "success") {
        window.location.reload();
      }
    });
  });

  $(".application-job").click(() => {
    let idJob = $(".application-job").attr("id-job");
    if (!idJob) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Did you actually apply this job !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Apply!",
    }).then(function (result) {
      if (result.value) {
        $.get(URL + "application/" + idJob, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
        });
      }
    });
  });

  $(".down-cv").click(function () {
    let idAp = $(this).attr("id-ap");

    if (!idAp) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "You want to download this file must pay 20,000 VND!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Payment now!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "payment/", { idAp }, function (data, status) {
          data = JSON.parse(data);

          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          window.open(data.link);
        });
      }
    });
  });

  $(".delete-cv").click(function () {
    let idCV = $(this).attr("id-cv");
    if (!idCV) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Do you want to delete this cv!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "cv-manager/delete", { idCV }, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          setTimeout(function () {
            window.reload();
          }, 2500);
        });
      }
    });
  });

  $(".delete-apply").click(function () {
    let idAp = $(this).attr("id-ap");
    if (!idAp) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Do you want to delete Apply!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "applied/delete", { idAp }, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          setTimeout(function () {
            window.reload();
          }, 2500);
        });
      }
    });
  });

  $(".delete-job").click(function () {
    let idJob = $(this).attr("id-job");
    if (!idJob) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Do you want to delete Job!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "manage-jobs/delete", { idJob }, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          setTimeout(function () {
            window.reload();
          }, 2500);
        });
      }
    });
  });

  $(".delete-user").click(function () {
    let idUser = $(this).attr("id-user");
    if (!idUser) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Do you want to delete User!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "admin/user/delete", { idUser }, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          setTimeout(function () {
            window.reload();
          }, 2500);
        });
      }
    });
  });

  $(".delete-company").click(function () {
    let idUser = $(this).attr("id-user");
    if (!idUser) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Do you want to delete Company!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "admin/company/delete", { idUser }, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          setTimeout(function () {
            window.reload();
          }, 2500);
        });
      }
    });
  });

  $(".delete-job-admin").click(function () {
    let idJob = $(this).attr("id-user");
    if (!idJob) {
      return;
    }
    swal({
      title: "Are you sure?",
      text: "Do you want to delete Job!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then(function (result) {
      if (result.value) {
        $.post(URL + "admin/job/delete", { idJob }, function (data, status) {
          data = JSON.parse(data);
          console.log(data);
          if (data.error) {
            swal("Error!", data.error, "warning");
            return;
          }
          swal("Success!", data.success, "success");
          setTimeout(function () {
            window.reload();
          }, 2500);
        });
      }
    });
  });

  inputDeadline.min = new Date().toISOString().split("T")[0];
});

async function postData(url, params) {
  let result = await $.post(URL + url, params, function (data) {
    data = JSON.parse(data);

    if (typeof data.error == "object") {
      $.each(data.error, function (key, value) {
        $("#error-" + key).text(value);
      });
      return;
    }

    let typeStatus = data.status == "success" ? "success" : "danger";

    $("#message-" + url).append(
      '<div class="alert alert-' +
        typeStatus +
        '" role="alert">' +
        data.message +
        "</div>"
    );
  });
  return JSON.parse(result);
}

function checkCaptcha() {
  var response = grecaptcha.getResponse();
  if (response.length == 0) {
    document.querySelector("#error-captcha").innerHTML =
      "Please verify you are humann!";
    return false;
  }
}
