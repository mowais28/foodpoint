function loginData(){ 
    $.ajax({
        type: "POST",
        url: "./login_script.php",   
        data: $("#login_data").serialize(),
        beforeSend:function(){
            $(".loading").html('Logging <img src="../assets/img/loader.gif" class="" style="width: auto;height:30px;" alt="">');
        },
        success: function (response) {
            $(".msg_box").html(response);
            $(".loading").html('<i class="fa fa-send"></i> Submit');
        }
    }); 
    document.getElementById("login_data").reset();
    return false;
}