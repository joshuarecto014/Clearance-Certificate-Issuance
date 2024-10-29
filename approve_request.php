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
    $sql = "SELECT * FROM requests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();

        // Insert the record into 'approved' table
        $insert_sql = "INSERT INTO approved (
            first_name, last_name, middle_name, civil_status, place_of_birth, 
            gender, address, id_file, tracking_id, contact, purpose, clearance_type, 
            id_number, date_issued, date_of_birth
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param(
            "sssssssssssssss", 
            $row['first_name'], $row['last_name'], $row['middle_name'], $row['civil_status'], 
            $row['place_of_birth'], $row['gender'], $row['address'], $row['id_file'], 
            $row['tracking_id'], $row['contact'], $row['purpose'], $row['clearance_type'], 
            $row['id_number'], $row['date_issued'], $row['date_of_birth']
        );

        if ($insert_stmt->execute()) {
            // If insert was successful, delete the record from 'requests' table
            $delete_sql = "DELETE FROM requests WHERE id = ?";
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