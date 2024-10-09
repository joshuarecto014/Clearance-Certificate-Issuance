<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="sub-module-style.css">
    <link rel="stylesheet" href="admin-dashboard-style.css">
    <link rel="stylesheet" href="modal-style.css">

    <title>Application</title>
  </head>
  <body>

   
      <div class="heading-body">
              <h2>Application Management</h2>
      </div>
      <div id="application-management" class="application-body">
         
          <div class="overviews">            
              <div class="column" id="overview">
                  <p>Request Overview</p>
                  <table>
                      <tr>
                          <th>ID</th>
                          <th>Document Name</th>
                          <th>Document Type</th>
                          <th>Code</th>
                          <th>File</th>
                          <th>Date Issued</th>
                          <th>Action</th>
                          
                      </tr>
                      <tbody>
                      <?php include 'fetch_requests.php'; ?> <!-- Include PHP script to fetch data -->
                      </tbody>
                  </table>
              </div>
              
          </div>
      </div>
      
      <script src="modal-script.js"></script> <!-- Your script for handling modal -->
  </body>
</html>
