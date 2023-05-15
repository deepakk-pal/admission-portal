<?php

/* getting all the records of the student from registration form */
$sfirstName = $_POST['studentFirstName'];
$smiddleName = $_POST['studentMiddleName'];
$slastName = $_POST['studentLastName'];
$sphoneNumber = $_POST['studentPhoneNumber'];
$sStandard = $_POST['studentStandard'];
$sSection = $_POST['studentSection'];
$sDOB = $_POST['studentDOB'];
$sGender = $_POST['studentGender'];
$sCountry = $_POST['studentCountry'];
$sState = $_POST['studentState'];
$sAddress = $_POST['studentAdsress'];

$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';

/* database connection */
$dsn = "mysql:host=$host;dbname=$database;";
$dbConnection = new PDO($dsn, $username, $password);


/* insert query to insert the records of student into database */
$insertQuery = "INSERT INTO `studentdetail`(`firstName`, `middleName`, `lastName`, `PhoneNumber`, `Standard`, `Section`, `DOB`, `Gender`, `Country`, `State`, `Address`) VALUES ('$sfirstName','$smiddleName','$slastName','$sphoneNumber','$sStandard','$sSection','$sDOB','$sGender','$sCountry','$sState','$sAddress')";
$insertStudent = $dbConnection->prepare($insertQuery);
$insertStudent->execute();
echo response("true", "record inserted successfully");

function response($status, $message)
{
    return json_encode(array("status" => $status, "message" => $message));
}
?>