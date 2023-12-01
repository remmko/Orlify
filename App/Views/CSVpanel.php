<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pujada CSV</title>
  <link rel="stylesheet" href="/main.css">
</head>

<style>
  input[type="file"] {
    border: 1px solid black;
    border-radius: 15px;
  }
</style>

<body>
  <?php require_once("nav.php") ?>
  <div class="flex items-center justify-center w-full">
    <div class="w-full">
      <p class="text-xl font-semibold">Puja un fitcher CSV</p>

      <form id="uploadForm" action="upload" method="post" enctype="multipart/form-data">
        <label for="file">Choose a CSV file:</label>
        <br>

        <div id="dropArea" class="w-64 h-64 border-2 border-dashed border-gray-500 flex items-center justify-center">
          <span class="text-gray-500">Drag and drop CSV files here</span>
          <input type="file" name="fitcher" id="fileInput" class="hidden" accept=".csv">
        </div>

        <div id="fileList" class="mt-4 text-gray-700"></div>

        <button type="submit" id="uploadButton" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Upload CSV</button>
      </form>
    </div>
  </div>

  <script>
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    const uploadForm = document.getElementById('uploadForm');

    dropArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropArea.classList.add('border-blue-500');
    });

    dropArea.addEventListener('dragleave', () => {
      dropArea.classList.remove('border-blue-500');
    });

    dropArea.addEventListener('drop', (e) => {
      e.preventDefault();
      dropArea.classList.remove('border-blue-500');

      const files = e.dataTransfer.files;
      handleFiles(files);

      // Create FormData object and append the file
      const formData = new FormData(uploadForm);
      formData.append('fitcher', files[0]); // Assuming only one file is dropped

      // Trigger form submission with the FormData object
      submitFormData(formData);
    });

    fileInput.addEventListener('change', () => {
      const files = fileInput.files;
      handleFiles(files);
    });

    function handleFiles(files) {
      fileList.innerHTML = '';

      for (const file of files) {
        if (file.type === 'text/csv') {
          const fileNameElement = document.createElement('p');
          fileNameElement.textContent = `File Name: ${file.name}`;
          fileList.appendChild(fileNameElement);
        } else {
          alert('Please drop a valid CSV file.');
        }
      }
    }

    function submitFormData(formData) {
    // Log the FormData object to ensure it's populated correctly
    console.log(formData);

    // Submit the form with the FormData object
    fetch('upload', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())  // Change to response.text() for HTML content
    .then(data => {
        // Display the HTML content within the #fileList element
        document.getElementById('fileList').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

  </script>

</body>

</html>