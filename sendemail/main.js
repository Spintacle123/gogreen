/* global base_url */

function multi_email() {

    
    $('#multi-responce').html("Sending to <span id='curent-email'></span>");

    var subject = $('#subject').val();
    var message = $('#message').val();

    var sname = $('#sname').val();
    var spass = $('#spass').val();
    var fromemail = $('#fromemail').val();
    var fromname = $('#fromname').val();


    var path_uri = "sengrid.php";


    var email = emails.split(',');



    $.ajax({
        type: "POST",
        url: path_uri,
        data: {
            sname: sname,
            spass: spass,
            fromemail: fromemail,
            fromname: fromname,
            emails: email_loop(email),
            subject: subject,
            message: message
        },
        success: function(data) {
            if (data == "success") {
                $('#multi-responce').html("Successfully sent");

            } else {
                $('#multi-responce').html(data);
            }
        }
    });
}

var i = 0;
function email_loop(emails) {
    $("#curent-email").html(email);
    if (++i < emails.length) {
        setTimeout(multi_email, 2000);
    }

    return email;
}