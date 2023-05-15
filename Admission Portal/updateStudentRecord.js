$(document).ready(function (e) {
    $('#updateStudentRecords').on('click', function (e) {

        var runid = $(this).data('runid')
        // collecting the data from stroung it in the variable
        var updateSFirstName = $('#firstname').val();
        var updateSMiddleName = $('#middlename').val();
        var updateSLastName = $('#lastname').val();
        var updateSPhone = $('#phone').val();
        var updateSStandard = $('#studentStandard').val();
        var updateSSection = $('#studentSection').val();
        var updateSDate = $('#date').val();
        var updateSGender = $('#gender').val();
        var updateSCountry = $('#studentCountry').val();
        var updateSState = $('#studentState').val();
        var updateSAddress = $('#studentAddress').val();


        // regex for validating input from the form
        var checkStudentUpdateFirstName = new RegExp(/^[a-zA-Z\s]+$/);
        var checkStudentUpdateMiddleName = new RegExp(/^[aA-zZ]+$/);
        var checkStudentUpdateLastName = new RegExp(/^[aA-zZ]+$/);
        var checkStudentUpdateStandard = new RegExp(/^[0-9]{2}$/);
        var checkStudentUpdateSec = new RegExp(/^[aA-zZ]+$/);
        var checkStudentUpdatePhone = new RegExp(/^[6789]{1}[0-9]{9}$/);

        // validation for firstname
        if (updateSFirstName == '') {
            $('#update_firstname_error').html("First Name required")
            return false;
        }
        else if (updateSFirstName.length < 2) {
            $('#update_firstname_error').html("First name should contain atleast 2 character");
            return false;
        } else if (!checkStudentUpdateFirstName.test(updateSFirstName)) {
            $('#update_firstname_error').html("First Name can contain only character");
            return false;
        }
        else {
            $('#update_firstname_error').html('')
        }


        //validation for middlename
        if (updateSMiddleName == '') {
            $('#update_middlename_error').html('')
        } else if (updateSMiddleName.length < 2) {
            $('#update_middlename_error').html('Middle Name should contain atleast 2 character')
            return false;
        } else if (!checkStudentUpdateMiddleName.test(updateSMiddleName)) {
            $('#update_middlename_error').html('Middle Name can contain only character')
            return false;
        } else {
            $('#update_middlename_error').html('')
        }



        //validation for last name
        if (updateSLastName == '') {
            $('#update_lastname_error').html('Last Name required')
            return false;
        } else if (updateSLastName.length < 2) {
            $('#update_lastname_error').html('Last Name should contain atleast 2 character')
            return false;
        }
        else if (!checkStudentUpdateLastName.test(updateSLastName)) {
            $('#update_lastname_error').html("Last Name can contain only character")
            return false;
        } else {
            $('#update_lastname_error').html('')
        }


        // valuidation for phone number
        if (updateSPhone == '') {
            $('#update_phone_error').html('Phone number can not empty')
            return false;
        } else if (updateSPhone.length < 10) {
            $('#update_phone_error').html('phone sholud contain 10 digit')
            return false;
        }
        else if (!checkStudentUpdatePhone.test(updateSPhone)) {
            $('#update_phone_error').html("Invalid phone number")
            return false;
        } else {
            $('#update_phone_error').html('')
        }

        // Validation for the standard
        if (updateSStandard == '') {
            $('#Standard_error').html('Standard can not be empty')
            return false;
        } else if (updateSStandard.length > 2) {
            $('#Standard_error').html('Standarad should contain only 2 digit')
            return false;
        }
        else if (!checkStudentUpdateStandard.test(updateSStandard)) {
            $('#Standard_error').html("Invalid standard")
            return false;
        } else {
            $('#Standard_error').html('')
        }

        // Validation for the Section
        if (updateSSection == '') {
            $('#Section_error').html('Section can not empty')
            return false;
        } else if (updateSSection.length > 4) {
            $('#Section_error').html('Section should contain maximum 4 character')
            return false;
        }
        else if (!checkStudentUpdateSec.test(updateSSection)) {
            $('#Section_error').html("Invalid section")
            return false;
        } else {
            $('#Section_error').html('')
        }

        // validation for date of birth
        if (updateSDate == '') {
            $('#date_error').html('Please select the date')
            return false;
        } else {
            $('#date_error').html('')
        }


        // validation for Gender
        if (updateSGender == '') {
            $('#gender_error').html('Please select gender')
            return false;
        } else {
            $('#gender_error').html('')
        }

        //validation for country
        if (updateSCountry == '') {
            $('#country_error').html('Please select Country')
            return false;
        } else {
            $('#country_error').html('')
        }

        //validation for state
        if (updateSState == '') {
            $('#state_error').html('Please select State')
            return false;
        } else {
            $('#state_error').html('')
        }

        //validation for address
        if (updateSAddress == '') {
            $('#adress_error').html('Adsrdess required')
            return false;
        } else {
            $('#adress_error').html('')
        }


        // sending the valid data to emp.php using ajax
        $.ajax({
            type: "POST",
            url: "finalupdatestudentrecord.php",
            dataType: "JSON",
            data: ({
                updateSFirstName: updateSFirstName,
                updateSMiddleName: updateSMiddleName,
                updateSLastName: updateSLastName,
                updateSPhone: updateSPhone,
                updateSStandard: updateSStandard,
                updateSSection: updateSSection,
                updateSDate: updateSDate,
                updateSGender: updateSGender,
                updateSCountry: updateSCountry,
                updateSState: updateSState,
                updateSAddress: updateSAddress,
                runid: runid
            }),
            success: function (response) {
                if (response['status'] == "true") {
                    alert(response['message']);
                    setTimeout((e) => { window.location.href = "studentDetailReport.php", "2000" });
                }
                if (response['status'] == "false") {
                    alert(response['message']);
                }
            }
        })
    })
})