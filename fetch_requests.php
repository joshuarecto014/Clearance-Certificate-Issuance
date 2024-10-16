<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "certificate_issuance";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get data from requests table
$sql = "SELECT ID, documentName, documentType, code, dateIssued, lastName, firstName, middleName, contactNum, purpose FROM requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr 
              data-id='" . $row['ID'] . "' 
              data-lastname='" . $row['lastName'] . "' 
              data-firstname='" . $row['firstName'] . "' 
              data-middlename='" . $row['middleName'] . "' 
              data-contactnum='" . $row['contactNum'] . "' 
              data-purpose='" . $row['purpose'] . "'>";

        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['documentName'] . "</td>";
        echo "<td>" . $row['documentType'] . "</td>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td><button class='action-btn'>View</button></td>";
        echo "<td>" . $row['dateIssued'] . "</td>";
        echo "<td><button class='btn-approve'>Approve</button> <button class='btn-disapprove'>Reject</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

$conn->close();


?>
