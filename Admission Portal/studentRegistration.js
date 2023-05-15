$(document).ready(function () {
    $('#submitDetails').on('click', function () {
        // getting the values of form
        var studentFirstName = $('#studentFirstName').val();
        var studentMiddleName = $('#studentMiddleName').val();
        var studentLastName = $('#studentLastName').val();
        var studentPhoneNumber = $('#studentPhoneNumber').val();
        var studentStandard = $('#studentStandard').val();
        var studentSection = $('#studentSection').val();
        var studentDOB = $('#studentDOB').val();
        var studentGender = $('#gender').val();
        var studentCountry = $('#studentCountry').val();
        var studentState = $('#studentState').val();
        var studentAdsress = $('#studentAddress').val();


        // Validating the input derails using RegEx
        var checkStudentFirstName = new RegExp(/^[a-zA-Z\s]+$/);
        var checkStudentMiddleName = new RegExp(/^[aA-zZ]+$/);
        var checkStudentLastName = new RegExp(/^[aA-zZ]+$/);
        var checkStudentStandard = new RegExp(/^[0-9]{2}$/);
        var checkStudentSec = new RegExp(/^[aA-zZ]+$/);
        var checkStudentPhone = new RegExp(/^[6789]{1}[0-9]{9}$/);


        // Validation for first name
        if (studentFirstName == '') {
            $('#firstname_error').html("First Name required")
            return false;
        }
        else if (studentFirstName.length < 2) {
            $('#firstname_error').html("First name should contain atleast 2 character");
            return false;
        } else if (!checkStudentFirstName.test(studentFirstName)) {
            $('#firstname_error').html("First Name can contain only character");
            return false;
        }
        else {
            $('#firstname_error').html('')
        }


        // Validation for Middle name
        if (studentMiddleName == '') {
            $('#middlename_error').html('')
        }
        else if (studentMiddleName.length < 2) {
            $('#middlename_error').html("middle name should contain atleast 2 character");
            return false;
        } else if (!checkStudentMiddleName.test(studentMiddleName)) {
            $('#middlename_error').html("Middle Name can contain only character");
            return false;
        }
        else {
            $('#middlename_error').html('')
        }


        // Validation for Last name
        if (studentLastName == '') {
            $('#lastname_error').html("Last Name required")
            return false;
        }
        else if (studentLastName.length < 2) {
            $('#lastname_error').html("Last name should contain atleast 2 character");
            return false;
        } else if (!checkStudentLastName.test(studentLastName)) {
            $('#lastname_error').html("Last Name can contain only character");
            return false;
        }
        else {
            $('#lastname_error').html('')
        }

        // validation for Phone number
        if (studentPhoneNumber == '') {
            $('#phone_error').html('Phone number can not empty')
            return false;
        } else if (studentPhoneNumber.length < 10) {
            $('#phone_error').html('phone sholud contain 10 digit')
            return false;
        }
        else if (!checkStudentPhone.test(studentPhoneNumber)) {
            $('#phone_error').html("Invalid phone number")
            return false;
        } else {
            $('#phone_error').html('')
        }

        // Validation for the standard
        if (studentStandard == '') {
            $('#Standard_error').html('Standard can not be empty')
            return false;
        } else if (studentStandard.length > 2) {
            $('#Standard_error').html('Standarad should contain only 2 digit')
            return false;
        }
        else if (!checkStudentStandard.test(studentStandard)) {
            $('#Standard_error').html("Invalid standard selection")
            return false;
        } else {
            $('#Standard_error').html('')
        }


        // Validation for the Section
        if (studentSection == '') {
            $('#Section_error').html('Phone number can not empty')
            return false;
        } else if (studentSection.length > 4) {
            $('#Section_error').html('Standarad should contain maximum 4 character')
            return false;
        }
        else if (!checkStudentSec.test(studentSection)) {
            $('#Section_error').html("Invalid standard selection")
            return false;
        } else {
            $('#Section_error').html('')
        }

        // validation for date of birth
        if (studentDOB == '') {
            $('#date_error').html('Please select the date')
            return false;
        } else {
            $('#date_error').html('')
        }


        // validation for Gender
        if (studentGender == '') {
            $('#gender_error').html('Please select gender')
            return false;
        } else {
            $('#gender_error').html('')
        }

        //validation for country
        if (studentCountry == '') {
            $('#country_error').html('Please select gender')
            return false;
        } else {
            $('#country_error').html('')
        }

         //validation for state
         if (studentState == '') {
            $('#state_error').html('Please select gender')
            return false;
        } else {
            $('#state_error').html('')
        }

        //validation for address
        if (studentAdsress == '') {
            $('#adress_error').html('Please select gender')
            return false;
        } else {
            $('#adress_error').html('')
        }
       

        


        //AJAX CALL

        $.ajax({
            url: "studentRegistraionDetail.php",
            type: "POST",
            dataType: "JSON",
            data: {
                studentFirstName: studentFirstName,
                studentMiddleName: studentMiddleName,
                studentLastName: studentLastName,
                studentPhoneNumber: studentPhoneNumber,
                studentStandard: studentStandard,
                studentSection: studentSection,
                studentDOB: studentDOB,
                studentGender: studentGender,
                studentCountry:studentCountry,
                studentState:studentState,
                studentAdsress:studentAdsress
            },
            success: function (response) {
                if (response["status"] == "true") {
                    alert(response["message"])
                    setTimeout((e) => { window.location.href = "studentDetailReport.php", "2000" });
                }

            }
        })


    })
})


// to export file into excel
$(document).ready(function () {
    $('#exportToExcel').click(function () {
        var excel_data = $('#studentReport').html();
        var page = "exportToExcel.php?data=" + excel_data;
        window.location = page;
    });
});


// to select xml file
$(document).ready(function () {

    // this to make a div visible to upload the excel file
    $('#importToExcel').on('click', function (e) {
        $('#importToExcelBrowser').css("display", "block")
        
    })

    // this to make a div visible to upload the XML file
    $('#importToXml').on('click', function (e) {
        $('#importToXmlBrowser').css("display", "block")
        

    })

    $('#logOutBtn').on('click', function(){
        
        setTimeout((e) => { window.location.href = "index.html", "2000" });
    })
});

$('#studentCountry').on('change', function(){
    var sCountry = $('#studentCountry').val();
    if(sCountry == "india"){
        $('#studentState').html('<option value="">Select State</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Odisha">Odisha</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Telangana">Telangana</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option>');

    } else if(sCountry == "nepal"){
        $('#studentState').html('<option value="">Select State</option><option value="Bagmati">Bagmati</option><option value="Koshi">Koshi</option><option value="Madhesh">Madhesh</option><option value="Lumbini">Lumbini</option><option value="Karnali">Karnali</option><option value="Sudurpashchim">Sudurpashchim</option>')
    } else{
        $('#studentState').html(' <option value="">Select state</option>');
    }

})




