<?php

//connecting with database 
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$database;";
$dbConnection = new PDO($dsn, $username, $password);

/* this condition is for creating account for admin */
if ($_REQUEST["dboperation"] == "createAccount") {
    $newUsername = $_POST['newUserName'];
    $firstname = $_POST['newFirstName'];
    $lastname = $_POST['newLastName'];
    $createPassword = $_POST['newPassword'];
    $adminkey = $_POST['newAdminKey'];




    $insertQuery = "INSERT INTO `admindetail`(`username`, `firstname`, `lastname`, `password`, `adminkey`) VALUES ('$newUsername', '$firstname', '$lastname', '$createPassword', '$adminkey')";
    $insertDetails = $dbConnection->prepare($insertQuery);
    $insertDetails->execute();
    echo response("true", "record inserted successfully");

}


/* this condition is for login for the admin login  */
if ($_REQUEST["dboperation"] == "login") {
    $adminUserName = $_POST['userName'];
    $adminpassword = $_POST['adminPassword'];

    $fetchQuery = "SELECT * FROM `admindetail`";
    $details = $dbConnection->prepare($fetchQuery);
    $details->execute();
    $result = $details->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        foreach ($result as $row) {
            $checkingUsername = $row->username;
           
            if ($checkingUsername === $adminUserName) {
                $checkingPassword = $row->password;
                
                if ($checkingPassword === $adminpassword) {
                    echo response("true", "Login successfull");
                    exit();
                }  
            }
        } 
        echo response("false","create account");
    }


}

/* this function is returning the response  */
function response($status, $message)
{
    return json_encode(array("status" => $status, "message" => $message));
}
?>