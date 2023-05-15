<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="fetch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- this is php code to connect with database -->
    <?php
    $host = 'localhost';
    $database = 'admission_portal';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$database;";

    try {
        $conn = new PDO($dsn, $username, $password);

        /* query to get the records and display the reports */
        $sql = "select * from studentdetail";
        $st = $conn->prepare($sql);
        $st->execute();
        $result = $st->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $error) {
        echo "some error";
    }
    ?>

    <!-- this div is for the button to add new student and log out  -->
    <div id="addNewLogOutBtnDiv">
        <button id="logOutBtn">Log out <i class="fa-solid fa-right-from-bracket"></i></button>
        <a href="studentRegistraionDetail.html"><button id="newAdmisssionBtn">New Admission
                <iclass="fa-regularfa-id-card"></i></button></a>
    </div>

    <!-- this div for the reports(records) of student -->
    <div id="studentReport">
        <h3 id="records">Student records</h3>
        <table id="table">

            <!--table heading  -->
            <tr id="title">
                <th>Serial No</th>
                <th>AdmNo</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Std</th>
                <th>Sec</th>
                <th>Dob</th>
                <th>Gender</th>
                <th>Country</th>
                <th>State</th>
                <th>Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            if ($result) {
                $serialNo = 1;
                foreach ($result as $row) {
                    ?>

                    <!-- table rows -->
                    <tr>
                        <td>
                            <?= $serialNo ?>
                        </td>

                        <td>
                            <?= $row->AdmissionNumber; ?>
                        </td>

                        <td>
                            <?= $row->firstName; ?>
                        </td>

                        <td>
                            <?= $row->middleName; ?>
                        </td>

                        <td>
                            <?= $row->lastName; ?>
                        </td>

                        <td>
                            <?= $row->PhoneNumber; ?>
                        </td>

                        <td>
                            <?= $row->Standard; ?>
                        </td>

                        <td>
                            <?= $row->Section; ?>
                        </td>

                        <td>
                            <?= $row->DOB; ?>
                        </td>

                        <td>
                            <?= $row->Gender; ?>
                        </td>

                        <td>
                            <?= $row->Country; ?>
                        </td>

                        <td>
                            <?= $row->State; ?>
                        </td>

                        <td>
                            <?= $row->Address; ?>
                        </td>


                        <td id="update">
                            <a title="click to update" href="studentRecordUpdate.php?id=<?= $row->AdmissionNumber; ?>"> <i
                                    class="fa-solid fa-user-pen"></i></a>
                        </td>

                        <td id="delete">
                            <a title="click to delete" href="deleteStudentrecord.php?id=<?= $row->AdmissionNumber; ?>"><i
                                    class="fa-solid fa-delete-left"></i></a>
                        </td>
                    </tr>

                    <?php
                    $serialNo += 1;
                }
            }
            ?>
        </table>
    </div>

    <!-- this div contain all the button -->
    <div id="BtnsToExportImport">
        <form action="exportToExcel.php" method="post" id="sendExcel">
            <button id="exportToExcel">Export to excel</button></form>
        <button id="importToExcel">Import Excel</button>
        <a href="exportToXmlFile.php"><button id="exportToXml">Export XML</button></a>
        <button id="importToXml">Import XML</button>
    </div>

    <!-- this div is for importing the excel file from system -->
    <div id="importToExcelBrowser" style="display: none;">
        <form method="post" action="uploadRecordThroughExcel.php" enctype="multipart/form-data">
            <input type="file" name="excel" id="excel">
            <button type="submit" name="import" id="import">Import</button>
        </form>
    </div>

    <!-- this div is for importing xml files  -->
    <div id="importToXmlBrowser" style="display: none;">
        <form action="uploadRecordThroughXml.php" method="post" enctype="multipart/form-data">
            <p>Select XML file</p>
            <input type="file" id="xmlimportingfile" name="xmlimportingfile">
            <button id="submitxmlfile">Submit</button>
        </form>
    </div>


    <!-- java script tags -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="studentRegistration.js"></script>
</body>

</html>