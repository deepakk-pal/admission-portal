<?php
// receiving the records to be updated
$updateSFirstName = $_POST['updateSFirstName'];
$updateSMiddleName = $_POST['updateSMiddleName'];
$updateSLastName = $_POST['updateSLastName'];
$updateSPhone = $_POST['updateSPhone'];
$updateSStandard = $_POST['updateSStandard'];
$updateSSection = $_POST['updateSSection'];
$updateSDate = $_POST['updateSDate'];
$updateSGender = $_POST['updateSGender'];
$updateSCountry = $_POST['updateSCountry'];
$updateSState = $_POST['updateSState'];
$updateSAddress = $_POST['updateSAddress'];
$admissionId = $_POST['runid'];

// connecting with the database 
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$database;";
try {
    $conn = new PDO($dsn, $username, $password);

    // query to update the required record in the tabe
    $updateRecordQry = $conn->prepare("UPDATE `studentdetail` SET `firstName`='$updateSFirstName',`middleName`='$updateSMiddleName',`lastName`='$updateSLastName',
    `PhoneNumber`='$updateSPhone',
    `Standard`='$updateSStandard',
    `Section`='$updateSSection',
    `DOB`='$updateSDate',
    `Gender`='$updateSGender',
    `Country`='$updateSCountry',
    `State`='$updateSState',
    `Address`='$updateSAddress' WHERE `AdmissionNumber`='$admissionId'");
    $updateRecordQry->execute();
    echo response("true", "data updated successfully");

} catch (PDOException $error) {
    echo "connection error";
}

function response($status, $message)
{
    return json_encode(array("status" => $status, "message" => $message));
}
?>