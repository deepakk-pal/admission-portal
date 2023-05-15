<?php

// DB connection
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$database;";
$conn = new PDO($dsn, $username, $password);

if (isset($_FILES['xmlimportingfile']) && $_FILES['xmlimportingfile']['error'] === UPLOAD_ERR_OK) {

    // temprory file path
    $tmpfilepath = $_FILES['xmlimportingfile']['tmp_name'];

    // laoding the temprory files
    $xml = simplexml_load_file($tmpfilepath) or die("Error: Cannot create object");
    echo $xml;

    foreach ($xml->children() as $row) {
        $firstName = $row->firstName;
        $middleName = $row->middleName;
        $lastName = $row->lastName;
        $PhoneNumber = $row->PhoneNumber;
        $Standard = $row->Standard;
        $Section = $row->Section;
        $DOB = $row->DOB;
        $Gender = $row->Gender;
        $Country = $row->Country;
        $State = $row->State;
        $Address = $row->Address;

        // validation for phone
        $checkPhonoQry = $conn->prepare("select count(*) as recordcnt from studentdetail where PhoneNumber = '$PhoneNumber'");
        $checkPhonoQry->execute();
        $checkPhonoArr = $checkPhonoQry->fetchAll(PDO::FETCH_ASSOC);
        if ($checkPhonoArr[0]['recordcnt'] > 0) {
            die("record alraedy exist");
        }

        // insert query to insert the records to the database from xml file
        $insertQueryXml = "INSERT INTO `studentdetail`(`firstName`, `middleName`, `lastName`, `PhoneNumber`, `Standard`, `Section`, `DOB`, `Gender`, `Country`, `State`, `Address`) VALUES ('$firstName','$middleName','$lastName','$PhoneNumber','$Standard','$Section','$DOB','$Gender','$Country','$State','$Address')";
        $insertIntoDatabase = $conn->query($insertQueryXml);

    }
    header('location:studentDetailReport.php');
}