/**
 * login from validation closure to validate the input fields and post an ajax request when successfully submitted.
 */
var login_form_validation = (function(){
    return function() {
        /**
         * Custom validation method to check for strong password
         */
        $.validator.addMethod("pwcheck", function(value) {
            return /^(?=^.{8,32}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$/.test(value)
         }, 'Password must contain a lowercase[a-z], uppercase[A-Z], digit[0-9] and special character[#@$&] and must of length between[8-32]');

        $("form[id='login_form']").validate({
            rules: {
                email: "required",
                pwd: {
                    pwcheck: true,
                    required: true,
                }
                
            },
            messages: {
                email: "Please enter Email ID",
                pwd: {
                    required: "Please enter password",
                }
            },
            submitHandler: function(){
                var form_data = $("#login_form").serialize();
                $.post("http://localhost/Training/index.php/Login/login_validation", form_data, function(role_id) {
                    // alert(role_id);
                    if(role_id == 1) {
                        window.location = "http://localhost/Training/index.php/Login/admin_view";
                    } else if(role_id == 2) {
                        window.location = "http://localhost/Training/index.php/Login/user_view";
                    } else if(role_id == 'FALSE') {
                        $('#notice').css('display', 'block');
                    }
                });
            }
        });
    }
})();

$(document).ready(function() {
    login_form_validation();
});