<?php
// DB connection
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$database;";
$conn = new PDO($dsn, $username, $password);

$fetchData = "select * from studentdetail";
$result = $conn->query($fetchData);

require_once 'Classes/PHPExcel.php';

$excel = new PHPExcel();
$sheet = $excel->getActiveSheet();

$headings = array('SerialNumber', 'AdmissionNumber', 'firstName', 'middleName', 'lastName', 'PhoneNumber', 'Standard', 'Section', 'DOB', 'Gender','Country','State','Address');
$col = 0;
foreach ($headings as $heading) {
    $sheet->setCellValueByColumnAndRow($col, 1, $heading);
    $col++;
}

$row = 2;
while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    $col = 0;
    foreach ($data as $value) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $col++;
    }
    $row++;
}


header('Content-Type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename="listOfStudent"');
header('Cache-Control: max-age=0');
$writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$writer->save('php://output');
exit;

?>