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
    let idJob = $(".application-job").attr('id-job');
    if(!idJob){
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
        $.get(
          URL + "application/"+idJob,
          function (data, status) {
            data = JSON.parse(data);
            console.log(data);
            if (data.error) {
              swal("Error!", data.error, "warning");
              return;
            }
            swal("Success!", data.success, "success");
          }
        );
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
