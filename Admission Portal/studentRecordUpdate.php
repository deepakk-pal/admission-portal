<!-- database connection and query to select data row wise !!!! -->

<?php
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$database;";
try {
    $conn = new PDO($dsn, $username, $password);

    /* getting the admission id of the student to update there records  */
    if (isset($_GET['id'])) {
        $admissionId = $_GET['id'];
        $admissionId_new = 'id';

        // query to update the records
        $singleStudentRecord = $conn->prepare("SELECT * FROM `studentdetail` WHERE  AdmissionNumber = '$admissionId' ");
        $singleStudentRecord->execute();
        $singleStudentRecordArr = $singleStudentRecord->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $error) {
    echo "connection error";
}

?>

<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update student record</title>
    <link rel="stylesheet" href="fetch.css">
</head>

<body>

    <div id="updateForm">
        <h4 id="updateDetails">Update Details</h4>

        <!-- admission ID -->
        <label for="admissionId" class="label">Adimission Id</label>
        <input type="text" id="noChange" class="input" value="<?= $singleStudentRecordArr[0]['AdmissionNumber']; ?>" readonly>

        <!-- first name  -->
        <label for="firstname" class="label">Firstname</label>
        <input type="text" class="input" id="firstname" value="<?= $singleStudentRecordArr[0]['firstName']; ?>">
        <span id="update_firstname_error"></span>


        <!-- middle name  -->
        <label for="middlename" class="label">Middlename</label>
        <input type="text" class="input" id="middlename" value="<?= $singleStudentRecordArr[0]['middleName']; ?>">
        <span id="update_middlename_error"></span>


        <!-- last name  -->
        <label for="lastname" class="label">Lastname</label>
        <input class="input" type="text" id="lastname" value="<?= $singleStudentRecordArr[0]['lastName']; ?>">
        <span id="update_lastname_error"></span>

        <!-- phone number  -->
        <label for="phone" class="label">Phone number</label>
        <input type="tel" class="input" id="phone" value="<?= $singleStudentRecordArr[0]['PhoneNumber']; ?>">
        <span id="update_phone_error"></span>

        <!-- standard -->
        <label for="studentStandard" class="label">Standard</label>
        <input class="input" type="tel" id="studentStandard" value="<?= $singleStudentRecordArr[0]['Standard']; ?>">
        <span id="Standard_error"></span>

        <!-- Section -->
        <label for="studentSection" class="label">Sec/Stream</label>
        <input class="input" class="input" type="tel" id="studentSection"
            value="<?= $singleStudentRecordArr[0]['Section']; ?>">
        <span id="Section_error"></span>

        <!-- date of birth -->
        <label for="date" class="label">Date of birth</label>
        <input type="date" class="input" id="date" value="<?= $singleStudentRecordArr[0]['DOB']; ?>">
        <span id="update_date_error"></span>

        <!-- gender  -->
        <label for="gender" class="label">Gender</label>
        <select id="gender" class="input" value="<?= $singleStudentRecordArr[0]['Gender']; ?>">
            <option value="">Select Gender</option>
            <option value="male" <?php
            if ($singleStudentRecordArr[0]['Gender'] == "male") {
                echo "selected";
            }
            ?>>male</option>
            <option value="female" <?php
            if ($singleStudentRecordArr[0]['Gender'] == "female") {
                echo "selected";
            }
            ?>>female
            </option>
            <option value="other" <?php
            if ($singleStudentRecordArr[0]['Gender'] == "other") {
                echo "selected";
            }
            ?>>other
            </option>
        </select>
        <span id="gender_error"></span>

        <!-- country -->
        <label for="studentCountry" class="label">Country</label>
        <select id="studentCountry" class="input" value="<?= $singleStudentRecordArr[0]['Country']; ?>">
            <option value="">Select country</option>
            <option value="india" <?php
            if ($singleStudentRecordArr[0]['Country'] == "india") {
                echo "selected";
            }
            ?>>India</option>
            <option value="nepal" <?php
            if ($singleStudentRecordArr[0]['Country'] == "nepal") {
                echo "selected";
            }
            ?>>Nepal</option>
        </select>
        <span id="country_error"></span>


        <!-- State -->
        <label for="studentState" class="label">State</label>
        <select id="studentState" class="input" value="<?= $singleStudentRecordArr[0]['State']; ?>">
            <option value="">Select state</option>
            <option value="Andhra Pradesh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Andhra Pradesh") {
                echo "selected";
            }
            ?>>Andhra Pradesh</option>
            <option value="Arunachal Pradesh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Arunachal Pradesh") {
                echo "selected";
            }
            ?>>Arunachal Pradesh</option>
            <option value="Assam" <?php
            if ($singleStudentRecordArr[0]['State'] == "Assam") {
                echo "selected";
            }
            ?>>Assam</option>
            <option value="Bihar" <?php
            if ($singleStudentRecordArr[0]['State'] == "Bihar") {
                echo "selected";
            }
            ?>>Bihar</option>

            <option value="Chhattisgarh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Chhattisgarh") {
                echo "selected";
            }
            ?>>Chhattisgarh</option>

            <option value="Goa" <?php
            if ($singleStudentRecordArr[0]['State'] == "Goa") {
                echo "selected";
            }
            ?>>Goa</option>

            <option value="Gujarat" <?php
            if ($singleStudentRecordArr[0]['State'] == "Gujarat") {
                echo "selected";
            }
            ?>>Gujarat</option>

            <option value="Haryana" <?php
            if ($singleStudentRecordArr[0]['State'] == "Haryana") {
                echo "selected";
            }
            ?>>Haryana</option>

            <option value="Himachal Pradesh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Himachal Pradesh") {
                echo "selected";
            }
            ?>>Himachal Pradesh</option>

            <option value="Jharkhand" <?php
            if ($singleStudentRecordArr[0]['State'] == "Jharkhand") {
                echo "selected";
            }
            ?>>Jharkhand</option>

            <option value="Karnataka" <?php
            if ($singleStudentRecordArr[0]['State'] == "Karnataka") {
                echo "selected";
            }
            ?>>Karnataka</option>

            <option value="Kerala" <?php
            if ($singleStudentRecordArr[0]['State'] == "Kerala") {
                echo "selected";
            }
            ?>>Kerala</option>

            <option value="Madhya Pradesh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Madhya Pradesh") {
                echo "selected";
            }
            ?>>Madhya Pradesh</option>

            <option value="Maharashtra" <?php
            if ($singleStudentRecordArr[0]['State'] == "Maharashtra") {
                echo "selected";
            }
            ?>>Maharashtra</option>

            <option value="Manipur" <?php
            if ($singleStudentRecordArr[0]['State'] == "Manipur") {
                echo "selected";
            }
            ?>>Manipur</option>

            <option value="Meghalaya" <?php
            if ($singleStudentRecordArr[0]['State'] == "Meghalaya") {
                echo "selected";
            }
            ?>>Meghalaya</option>

            <option value="Mizoram" <?php
            if ($singleStudentRecordArr[0]['State'] == "Mizoram") {
                echo "selected";
            }
            ?>>Mizoram</option>

            <option value="Nagaland" <?php
            if ($singleStudentRecordArr[0]['State'] == "Nagaland") {
                echo "selected";
            }
            ?>>Nagaland</option>

            <option value="Odisha" <?php
            if ($singleStudentRecordArr[0]['State'] == "Odisha") {
                echo "selected";
            }
            ?>>Odisha</option>

            <option value="Punjab" <?php
            if ($singleStudentRecordArr[0]['State'] == "Punjab") {
                echo "selected";
            }
            ?>>Punjab</option>

            <option value="Rajasthan" <?php
            if ($singleStudentRecordArr[0]['State'] == "Rajasthan") {
                echo "selected";
            }
            ?>>Rajasthan</option>

            <option value="Sikkim" <?php
            if ($singleStudentRecordArr[0]['State'] == "Sikkim") {
                echo "selected";
            }
            ?>>Sikkim</option>

            <option value="Tamil Nadu" <?php
            if ($singleStudentRecordArr[0]['State'] == "Tamil Nadu") {
                echo "selected";
            }
            ?>>Tamil Nadu</option>

            <option value="Telangana" <?php
            if ($singleStudentRecordArr[0]['State'] == "Telangana") {
                echo "selected";
            }
            ?>>Telangana</option>

            <option value="Tripura" <?php
            if ($singleStudentRecordArr[0]['State'] == "Tripura") {
                echo "selected";
            }
            ?>>Tripura</option>

            <option value="Uttar Pradesh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Uttar Pradesh") {
                echo "selected";
            }
            ?>>Uttar Pradesh</option>

            <option value="Uttarakhand" <?php
            if ($singleStudentRecordArr[0]['State'] == "Uttarakhand") {
                echo "selected";
            }
            ?>>Uttarakhand</option>

            <option value="West Bengal" <?php
            if ($singleStudentRecordArr[0]['State'] == "West Bengal") {
                echo "selected";
            }
            ?>>West Bengal</option>

            <option value="Bagmati" <?php
            if ($singleStudentRecordArr[0]['State'] == "Bagmati") {
                echo "selected";
            }
            ?>>Bagmati</option>

            <option value="Koshi" <?php
            if ($singleStudentRecordArr[0]['State'] == "Koshi") {
                echo "selected";
            }
            ?>>Koshi</option>

            <option value="Madhesh" <?php
            if ($singleStudentRecordArr[0]['State'] == "Madhesh") {
                echo "selected";
            }
            ?>>Madhesh</option>
            <option value="Lumbini" <?php
            if ($singleStudentRecordArr[0]['State'] == "Lumbini") {
                echo "selected";
            }
            ?>>Lumbini</option>

            <option value="Karnali" <?php
            if ($singleStudentRecordArr[0]['State'] == "Karnali") {
                echo "selected";
            }
            ?>>Karnali</option>

            <option value="Sudurpashchim" <?php
            if ($singleStudentRecordArr[0]['State'] == "Sudurpashchim") {
                echo "selected";
            }
            ?>>Sudurpashchim</option>
        </select>
        <span id="state_error"></span>


        <!-- address -->
        <label for="studentAddress" class="label">Address</label>
        <input class="input" type="text" id="studentAddress" value="<?= $singleStudentRecordArr[0]['Address']; ?>">
        <span id="adress_error"></span>


        <!-- button to submit the updated records and back to login page  -->
        <button id="updateStudentRecords" data-runid="<?= $_GET['id']; ?>">Update</button>
        <a href="studentDetailReport.php"><button id="BackToHomePage">Back</button></a>

    </div>

    <input type="hidden" id="runid" value="<?= $_GET['id']; ?>">



    <!-- java script -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="updateStudentRecord.js"></script>


</body>

</html>