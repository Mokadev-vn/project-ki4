const URL = "http://localhost/project-ki4/";
$(document).ready(function() {
    $("#login").click(function() {
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
        $("#message").html("");

        postData("login", data).then(function(data){
            console.log(data);
        });

    });
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
 
    $("#message").append('<div class="alert alert-'+ typeStatus +'" role="alert">'+ data.message +'</div>');
      
    });
    return JSON.parse(result);
  }