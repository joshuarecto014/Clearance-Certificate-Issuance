document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('file').click(); // Trigger file input when custom button is clicked
  });
  
  document.getElementById('file').addEventListener('change', function() {
    // Automatically submit the form when a file is selected
    document.getElementById('submitBtn').click();
  });