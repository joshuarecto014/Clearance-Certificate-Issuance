<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "certificate_issuance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed via POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Get the record from 'requests' table
    $sql = "SELECT * FROM requests WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();

        // Insert the record into 'approved' table
        // Skip the ID column if it's AUTO_INCREMENT
        $insert_sql = "INSERT INTO approved (documentName, lastName, firstName, middleName, contactNum, purpose, documentType, code, dateIssued) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param(
            "sssssssss", 
            $row['documentName'], 
            $row['lastName'], 
            $row['firstName'], 
            $row['middleName'], 
            $row['contactNum'], 
            $row['purpose'], 
            $row['documentType'], 
            $row['code'], 
            $row['dateIssued']
        );

        if ($insert_stmt->execute()) {
            // If insert was successful, delete the record from 'requests' table
            $delete_sql = "DELETE FROM requests WHERE ID = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $id);
            $delete_stmt->execute();

            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to insert into approved"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Record not found"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "ID not provided"]);
}
?>