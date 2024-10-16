<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renewal</title>
    <link rel="stylesheet" href="sub-module-style.css">
    <link rel="stylesheet" href="modal-style.css">


</head>
<body>
    

        <div class="heading-body">         
                <h2>Renewal Management</h2>
        </div>
        <div id="" class="renewal-body">
           
            <div class="overviews">            
                <div class="column" id="overview">
                    <p>Request Overview</p>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Document Name</th>
                            <th>Code</th>
                            <th>File</th>
                            <th>Date Issued</th>
                            <th>Action</th>
                            
                        </tr>
                        <tbody>
                        <?php include 'fetch_renewals.php'; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>



        <script src="modal-script.js"></script> <!-- Your script for handling modal -->

</body>
</html>