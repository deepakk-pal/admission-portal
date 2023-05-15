<?php
$host = 'localhost';
$database = 'admission_portal';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$database;";
try {
  $conn = new PDO($dsn, $username, $password);

  /* this query is to select the records from  table */
  $queryToRead = $conn->query("SELECT * FROM studentdetail");

  /* creating object for the SimpleXMLElement class  */
  $xml = new SimpleXMLElement('<data/>');

  /* this loop is to check the select the records from table and insert in the xml file  */
  while ($row = $queryToRead->fetch(PDO::FETCH_ASSOC)) {
    $item = $xml->addChild('item');
    foreach ($row as $key => $value) {
      $item->addChild($key, $value);
    }
  }

  
  /* saving the xml file of student records */
  $xml->asXML('studentRecords.xml');

  /* closing the connection  */
  $conn = null;
 
  /* header method the give the required path */
  header('location:studentDetailReport.php');
    
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>