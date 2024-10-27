<?php
// Database connection
$host = "localhost"; // Your database host
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "certificate_issuance"; // Your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    // Get file details
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];

    // Check if file is a valid Word document
    $allowedTypes = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    if (in_array($fileType, $allowedTypes)) {
        // Read file content
        $fileContent = file_get_contents($fileTmp);
        $fileContent = mysqli_real_escape_string($conn, $fileContent);

        // Insert file content and name into the database
        $sql = "INSERT INTO template (docs, filename) VALUES ('$fileContent', '$fileName')";
        
        if ($conn->query($sql) === TRUE) {
            echo "File uploaded and saved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Only .doc or .docx files are allowed.";
    }
}

$conn->close();
?>