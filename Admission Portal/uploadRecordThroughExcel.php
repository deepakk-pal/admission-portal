<?php

// DB connection
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$database;";
$conn = new PDO($dsn, $username, $password);

require 'Classes/PHPExcel.php';

include "PHPExcel/IOFactory.php";


// getting the files extension
$tmp = explode(".", $_FILES["excel"]["name"]);
$extension = end($tmp);

// validationg the files should be excel file only
$allowed_extension = array("xls", "xlsx", "csv");


if (in_array($extension, $allowed_extension)) {

    // getting temporary source of excel file
    $file = $_FILES["excel"]["tmp_name"];
    $objPHPExcel = PHPExcel_IOFactory::load($file);

    $spreadSheet = $objPHPExcel->getWorksheetIterator();

    foreach ($spreadSheet as $worksheet) {
        $High_Row = $worksheet->getHighestRow();

        for ($row = 2; $row <= $High_Row; $row++) {

            $firstName = $worksheet->getCellByColumnAndRow(0, $row);
            $middleName = $worksheet->getCellByColumnAndRow(1, $row);
            $lastName = $worksheet->getCellByColumnAndRow(2, $row);
            $PhoneNumber = $worksheet->getCellByColumnAndRow(3, $row);
            $Standard = $worksheet->getCellByColumnAndRow(4, $row);
            $Section = $worksheet->getCellByColumnAndRow(5, $row);
            $DOB = $worksheet->getCellByColumnAndRow(6, $row)->getFormattedValue();
            $st = strtotime($DOB);
            $dateh = date('Y-m-d', $st);
            $Gender = $worksheet->getCellByColumnAndRow(7, $row);
            $Country = $worksheet->getCellByColumnAndRow(8, $row);
            $State = $worksheet->getCellByColumnAndRow(9, $row);
            $Address = $worksheet->getCellByColumnAndRow(10, $row);


            // validation for phone
            $checkPhonoQry = $conn->prepare("select count(*) as recordcnt from studentdetail where PhoneNumber = '$PhoneNumber'");
            $checkPhonoQry->execute();
            $checkPhonoArr = $checkPhonoQry->fetchAll(PDO::FETCH_ASSOC);
            if ($checkPhonoArr[0]['recordcnt'] > 0) {
                echo "record alraedy exist";
                exit;
            }

            $insertExcelRecordQuery = "INSERT INTO `studentdetail`(`firstName`, `middleName`, `lastName`, `PhoneNumber`, `Standard`, `Section`, `DOB`, `Gender`, `Country`, `State`, `Address`) VALUES ('$firstName','$middleName','$lastName','$PhoneNumber','$Standard','$Section','$dateh','$Gender','$Country','$State','$Address')";
            $conn->query($insertExcelRecordQuery);
            echo '<script type ="text/JavaScript">';
            echo 'alert(" recorde inserted successfully!! ")';
            echo '</script>';
            header('location:studentDetailReport.php');
        }

    }
}



?>