<?php
// Database credentials
$servername = "localhost"; // Your database server (e.g., localhost)
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "certificate_issuance"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get data from the renewal table
$sql = "SELECT ID, `Document name`, code, `Date issued` FROM renewal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Document name'] . "</td>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td><a href='#'>VIEW</a></td>"; // Adjust the link to match your file viewer
        echo "<td>" . $row['Date issued'] . "</td>";
        echo "<td><button class='action-btn'>View</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}

$conn->close();
?>