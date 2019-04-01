// login from validation closure to validate the input fields and post an ajax request when successfully submitted.
 
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
                email: "Please enter valid Email ID",
                pwd: {
                    required: "Please enter password",
                }
            },
            submitHandler: function(){
                let form_data = $("#login_form").serialize();
                // alert(from_data);
                $.post("http://localhost/Training/index.php/Login/login_validation", form_data, function(response) {
                    if(response.url !== null && typeof response.url !== 'undefined' && response.url !== "false" ) {
                        window.location = response.url; 
                    } else {
                        $('#notice').css('display', 'block');
                    }
                }, "json");
            }
        });
    }
})();

$(document).ready(function() {
    login_form_validation();
});