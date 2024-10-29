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

// Query to get data from the updated requests table
$sql = "SELECT id, first_name, last_name, middle_name, civil_status, place_of_birth, gender, address, id_file, tracking_id, contact, purpose, clearance_type, id_number, date_issued, date_of_birth FROM requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr 
        data-id='" . $row['id'] . "' 
        data-lastname='" . $row['last_name'] . "' 
        data-firstname='" . $row['first_name'] . "' 
        data-middlename='" . $row['middle_name'] . "' 
        data-contactnum='" . $row['contact'] . "' 
        data-purpose='" . $row['purpose'] . "' 
        data-address='" . $row['address'] . "' 
        data-placeofbirth='" . $row['place_of_birth'] . "' 
        data-civilstatus='" . $row['civil_status'] . "' 
        data-gender='" . $row['gender'] . "' 
        data-dateofbirth='" . $row['date_of_birth'] . "'>";

        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['clearance_type'] . "</td>";
        echo "<td>" . $row['tracking_id'] . "</td>";
        echo "<td><button class='action-btn'>View</button></td>";
        echo "<td>" . $row['date_issued'] . "</td>";
        echo "<td><button class='btn-approve'>Approve</button> <button class='btn-disapprove'>Reject</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}