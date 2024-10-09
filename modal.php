<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="modal-style.css" rel="stylesheet" />
  </head>

  <body>
    <div id="manageDetailsModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Manage Details</span>
          <button class="btn-close" id="closeModalBtn">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <label for="lastName">Last Name</label>
            <input
              type="text"
              id="lastName"
              class="form-control"
              value="tae"
              disabled
            />
            <label for="firstName">First Name</label>
            <input
              type="text"
              id="firstName"
              class="form-control"
              value="Mabaho"
              disabled
            />
            <label for="middleName">Middle Name</label>
            <input
              type="text"
              id="middleName"
              class="form-control"
              value="tae"
              disabled
            />
            <label for="contactNumber">Contact Number</label>
            <input
              type="text"
              id="contactNumber"
              class="form-control"
              value="1231231231"
              disabled
            />
            <label for="typeOfCertificate">Type of Certificate</label>
            <input
              type="text"
              id="typeOfCertificate"
              class="form-control"
              value="Barangay Indigency"
              disabled
            />
            <label for="purpose">Purpose</label>
            <input
              type="text"
              id="purpose"
              class="form-control"
              value="SCHOLARSHIP"
              disabled
            />
            <label for="quantity">Quantity</label>
            <input
              type="text"
              id="quantity"
              class="form-control"
              value="1"
              disabled
            />
            <label for="responseMessage">Response Message</label>
            <textarea
              id="responseMessage"
              class="form-control"
              rows="3"
            ></textarea>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn-approve" id="approveBtn">Approve</button>
          <button class="btn-disapprove" id="disapproveBtn">Disapprove</button>
        </div>
      </div>
    </div>

    <script src="modal-script.js"></script>
  </body>
</html>
