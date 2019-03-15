/**
 * login from validation closure to validate the input fields and post an ajax request when successfully submitted.
 */
var login_form_validation = (function(){
    return function() {
        $("form[id='login_form']").validate({
            rules: {
                email: "required",
                pwd: "required"
            },
            messages: {
                email: "Please enter Email ID (Validation)",
                pwd: "Please enter Password (Validation)"
            },
            submitHandler: function(){
                var form_data = $("#login_form").serialize();
                $.post("http://localhost/Training/index.php/Login/login_validation", form_data, function(result){
                    if(result == 1) {
                        window.location = "http://localhost/Training/index.php/Login/admin_view";
                    } else if(result == 2) {
                        window.location = "http://localhost/Training/index.php/Login/user_view";
                    } else {
                        $('#notice').css('display', 'block');
                    }
                });
            }
        });
    }
})();

$(document).ready(function(){
    login_form_validation();
});