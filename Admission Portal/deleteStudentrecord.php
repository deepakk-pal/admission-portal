<?php
/* getting id of the student of whom records shuld be deleted */

$recordToDelete = $_GET['id'];

// connecting to database
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$database;";

try {
    $conn = new PDO($dsn, $username, $password);

    /* Query to delete the records */
    $studentDeleteQry = $conn->prepare("DELETE FROM `studentdetail` WHERE AdmissionNumber = '$recordToDelete'");
    $studentDeleteQry->execute();
    if($studentDeleteQry){
        
        /* using header method to give the path after execution of delete query */
        header('location:studentDetailReport.php');
        echo"record deleted successfully";
    }
    else{
    echo "Some error occur";
    }
} catch (PDOException $error) {
    echo "some error";
}

function response($status, $message)
{
    return json_encode(array("status" => $status, "message" => $message));
}
?>