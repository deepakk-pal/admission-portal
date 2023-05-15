$(document).ready(function () {
    $('#adminLoginBtn').on('click', function () {
        var userName = $('#adminUserName').val();
        var adminPassword = $('#adminPassword').val();

        /* ajax call */
        $.ajax({
            url: "adminLogin.php",
            type: "POST",
            dataType: "JSON",
            data: {
                dboperation: "login",
                userName: userName,
                adminPassword: adminPassword
            },

            /* getting response frim ajax */
            success: function (response) {
                if (response["status"] == "false") {
                    $('#invalidErrorMessage').html('Username or Password in incorrect')
                }
                if (response["status"] == "true") {
                    alert(response["message"]);
                    setTimeout((e) => { window.location.href = "studentDetailReport.php", "2000" });

                }
            }
        })



    })
    $('#adminCreateAccBtn').on('click', function (e) {
        $('#adminLoginForm').css("display", "none");
        $('#adminRegistrationForm').css("display", "block");
    })

    $('#submitNewAdminDetail').on('click', function (e) {

        /* getting the records of admin through html form  */
        var newUserName = $('#newAdminUsername').val();
        var newFirstName = $('#newAdminFirstname').val();
        var newLastName = $('#newAdminLastname').val();
        var newPassword = $('#newAdminpassword').val();
        var newCnrfmPassword = $('#newAdminCnrfmpassword').val();
        var newAdminKey = $('#newAdminkey').val();

        /* condition for validation in RegEx */
        var checknewUserName = new RegExp(/^[a-zA-Z\s]+$/);
        var checknewFirstName = new RegExp(/^[a-zA-Z\s]+$/);
        var checknewLastName = new RegExp(/^[a-zA-Z\s]+$/);
        var checknewPassword = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)
        var checknewAdminKey = "abc";

        // Validation for User name
        if (newUserName == '') {
            $('#UserNameError').html("User Name required")
            return false;
        }
        else if (newUserName.length < 6) {
            $('#UserNameError').html("User name should contain atleast six character");
            return false;
        } else if (!checknewUserName.test(newUserName)) {
            $('#UserNameError').html("User Name can contain only character");
            return false;
        }
        else {
            $('#UserNameError').html('')
        }

        // Validation for first name
        if (newFirstName == '') {
            $('#firstnameError').html("First Name required")
            return false;
        }
        else if (newFirstName.length < 2) {
            $('#firstnameError').html("First name should contain atleast two character");
            return false;
        } else if (!checknewFirstName.test(newFirstName)) {
            $('#firstnameError').html("First Name can contain only character");
            return false;
        }
        else {
            $('#firstnameError').html('')
        }

        // Validation for Last name
        if (newLastName == '') {
            $('#LastNameError').html("Last Name required")
            return false;
        }
        else if (newLastName.length < 3) {
            $('#LastNameError').html("Last name should contain atleast 3 character");
            return false;
        } else if (!checknewLastName.test(newLastName)) {
            $('#LastNameError').html("Last Name can contain only character");
            return false;
        }
        else {
            $('#LastNameError').html('')
        }

        // Validation for Password
        if (newPassword == '') {
            $('#newPasswordError').html("Password required")
            return false;
        }
        else if (newPassword.length < 6) {
            $('#newPasswordError').html("Password should contain atleast six character");
            return false;
        } else if (!checknewPassword.test(newPassword)) {
            $('#newPasswordError').html("Password should contain 1Number 1uppercase 1lowercase");
            return false;
        }
        else {
            $('#newPasswordError').html('')
        }

        // Validation for  confirm Password
        if (newCnrfmPassword == '') {
            $('#newCnrfmPasswordError').html("Re enter the password")
            return false;
        }
        else if (newCnrfmPassword != newPassword) {
            $('#newCnrfmPasswordError').html("Password is not matching");
            return false;
        }
        else {
            $('#newCnrfmPasswordError').html('')
        }

        // Validation for adminKey
        if (newAdminKey == '') {
            $('#newAdminKeyError').html("Admin Key required")
            return false;
        }
        else if (newAdminKey !== checknewAdminKey) {
            $('#newAdminKeyError').html("admin key does not match");
            return false;
        }
        else {
            $('#newAdminKeyError').html('')
        }

        
        $.ajax({
            
            url: "adminLogin.php",
            type: "POST",
            dataType: "JSON",
            data: {
                dboperation: "createAccount",
                newUserName: newUserName,
                newFirstName: newFirstName,
                newLastName: newLastName,
                newPassword: newPassword,
                newAdminKey: newAdminKey
            },

            success: function (response) {
                if (response["status"] == "true") {
                    alert(response["message"]);
                    setTimeout((e) => { window.location.href = "index.html", "2000" });
                }
                if(response["status"]=="false"){
                    alert(response["message"]);
                    setTimeout((e) => { window.location.href = "index.html", "2000" });
                }
            }
        })

    })
})



