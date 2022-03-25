$(".toggle-password1").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

function displayBtnLogin() {
    var email = document.getElementById("email1").value.trim();
    var password = document.getElementById("password1").value.trim();
    var emailError = document.getElementById("email1-error");
    var flag = false;
    var emailErrorFlag = emailError.hidden;

    if (
        email != "" &&
        password != "" &&
        emailErrorFlag
    ) {
        // Enable button
        flag = false;
    } else {
        // Disable button
        flag = true;
    }

    document.getElementById("btn-login").disabled = flag;
}

function validate(input) {
    displayBtnLogin();

    if (input.type == "email") {
        var email = input.value;
        var emailError = document.getElementById("email1-error");

        var emailSplit = email.split("@");

        // Check validate
        if (
            email.indexOf("@") < 1 ||
            email.indexOf("@") != email.lastIndexOf("@") ||
            email.lastIndexOf("@") == email.length - 1 ||
            email.indexOf(".") < 1 ||
            email.lastIndexOf(".") == email.length - 1 ||
            email.indexOf(".") == email.indexOf("@") + 1 ||
            email.indexOf(".") == email.indexOf("@") - 1

        ) {
            // Show email error
            emailError.hidden = false;
        } else {
            // Remove email error
            emailError.hidden = true;
        }
    } else {
        var password = input.value;
        var passwordError = document.getElementById("password1-error");

        if (password.length < 8) {
            passwordError.hidden = false;
            passwordError.innerHTML = "Password it nhat 8 ky ty";
        } else {
            passwordError.hidden = true;
        }
    }
}

// JS show/hide pass sign in

$(".toggle-password2").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//test Pass Mail sign in

function displayBtnSignUp() {
    var email = document.getElementById("email2").value.trim();
    var password = document.getElementById("password2").value.trim();
    var emailError = document.getElementById("email2-error");
    var flag = false;
    var emailErrorFlag = emailError.hidden;
    if (email != "" && password != "" && emailErrorFlag) {
        // Enable button
        flag = false;
    } else {
        // Disable button
        flag = true;
    }
    document.getElementById("btn-signup").disabled = flag;
}

function validate2(input) {
    displayBtnSignUp();

    if (input.type == "email") {
        var email = input.value;
        var emailError = document.getElementById("email2-error");
        var emailSplit = email.split("@");

        // Check validate
        if (
            email.indexOf("@") < 1 ||
            email.indexOf("@") != email.lastIndexOf("@") ||
            email.lastIndexOf("@") == email.length - 1 ||
            email.indexOf(".") < 1 ||
            email.lastIndexOf(".") == email.length - 1 ||
            email.indexOf(".") == email.indexOf("@") + 1 ||
            email.indexOf(".") == email.indexOf("@") - 1
            // emailSplit.length != 2 || emailSplit[0] == '' || emailSplit[1] == ''
        ) {
            // Show email error
            emailError.hidden = false;
        } else {
            // Remove email error
            emailError.hidden = true;
        }
    } else {
        var password = input.value;
        var passwordError = document.getElementById("password2-error");

        if (password.length < 8) {
            passwordError.hidden = false;
            passwordError.innerHTML = "Password it nhat 8 ky tu";
            // } else if (/(\@|\%|\$)/.test(password) == false) {
            //     passwordError.hidden = false;
            //     passwordError.innerHTML =
            //     "Password it nhat phai co 1 trong cac ky tu @, $, %";
        } else {
            passwordError.hidden = true;
        }
    }
}