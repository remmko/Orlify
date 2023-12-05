<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pujada CSV</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="/main.css">

  <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
</head>
<style>
  .bg-custom {
    background-color: #1a4bd0;
  }
</style>

<body class="bg-gray-50 overflow-hidden">
  <?php require_once("nav.php") ?>
  <div class="items-center justify-center">

    <?php require_once("modalsCSVPanel.php") ?>

    <div class="flex items-center justify-center h-screen">
      <div class="w-full max-w-3xl bg-white p-8 shadow-md">
        <p class="text-xl font-semibold mb-4">Puja un fitcher CSV</p>

        <form id="uploadForm" action="upload" method="post" enctype="multipart/form-data">
          <label for="file" class="block mt-4 mb-2">Escull un fitcher CSV</label>

          <div id="dropArea" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-500 flex items-center justify-center rounded-xl mb-4">
            <img src="/img/subir-archivo.svg" alt="Imatge de pujada d'elements" class="w-24 mb-4" draggable="false">
            <span id="dropText" class="">Seleccioneu un fitxer o arrossegueu-lo i deixeu-lo anar aquí</span>
            <input type="file" aria-label="Entrada fitchers CSV" name="fitcher" id="fileInput" class="hidden" accept=".csv">
          </div>

          <div id="fileList" class="mt-4 text-gray-700"></div>
        </form>

        <!-- Modal toggle -->
        <div class="flex space-x-4 mt-4">
          <button data-modal-target="errorLogModal" data-modal-toggle="errorLogModal" id="errorModalButton" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Resultats
          </button>
          <button data-modal-target="explanationModal" data-modal-toggle="explanationModal" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Ajuda
          </button>
          <button data-modal-target="exampleModal" data-modal-toggle="exampleModal" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Exemple CSV
          </button>
          <button data-modal-target="aliasModal" data-modal-toggle="aliasModal" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Àlies de les classes
          </button>
        </div>

      </div>
    </div>


  </div>

  <script src="/js/flowbite.min.js"></script>
  <script src="/js/bundle.js"></script>
  <script src="/js/index.js"></script>

  <script>
    const dropArea = document.getElementById('dropArea');
    const dropText = document.getElementById('dropText');
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    const uploadForm = document.getElementById('uploadForm');

    dropArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropArea.classList.add('border', 'border-solid', 'bg-custom', 'text-white');
      dropArea.classList.remove('border-dashed');
      dropText.textContent = 'Drop';
    });

    dropArea.addEventListener('dragleave', () => {
      dropArea.classList.remove('bg-custom', 'text-white');
      dropArea.classList.add('border-dashed');
      dropText.textContent = 'Drag and drop CSV files here';
    });

    dropArea.addEventListener('drop', (e) => {
      e.preventDefault();
      dropArea.classList.remove('bg-custom', 'text-white');
      dropArea.classList.add('border-dashed');
      dropText.textContent = 'Drag and drop CSV files here';

      const files = e.dataTransfer.files;
      handleFiles(files);

      // Change the text of the button to "Loading" and disable it
      const uploadButton = document.getElementById('errorModalButton');
      if (uploadButton) {
        uploadButton.textContent = 'Loading';
        uploadButton.disabled = true;
        uploadButton.classList.add('cursor-not-allowed');

        // Create FormData object and append the file
        const formData = new FormData(uploadForm);
        formData.append('fitcher', files[0]); // Assuming only one file is dropped

        // Trigger form submission with the FormData object
        submitFormData(formData);
      }
    });

    fileInput.addEventListener('change', () => {
      const files = fileInput.files;
      handleFiles(files);

      // Change the text of the button to "Loading" and disable it
      const uploadButton = document.getElementById('errorModalButton');
      if (uploadButton) {
        uploadButton.textContent = 'Loading';
        uploadButton.disabled = true;
        uploadButton.classList.add('cursor-not-allowed');

        // Create FormData object and append the file
        const formData = new FormData(uploadForm);
        formData.append('fitcher', files[0]); // Assuming only one file is selected

        // Trigger form submission with the FormData object
        submitFormData(formData);
      }
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

      // Disable the button and set its text to "Loading"
      const uploadButton = document.getElementById('errorModalButton');
      if (uploadButton) {
        uploadButton.textContent = 'Loading';
        uploadButton.disabled = true;
        uploadButton.classList.add('cursor-not-allowed'); // Add the cursor-not-allowed class
      }

      // Submit the form with the FormData object
      fetch('upload', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          // Display the response content within the modal
          document.getElementById('errorLogModalText').innerHTML = data;

          // Re-enable the button and set its text back to "Resultats"
          if (uploadButton) {
            uploadButton.textContent = 'Resultats';
            uploadButton.disabled = false;
            uploadButton.classList.remove('cursor-not-allowed'); // Remove the cursor-not-allowed class
          }

          // Show the modal if not already visible
          document.getElementById('errorLogModal').style.opacity = '1';
        })
        .catch(error => {
          console.error('Error:', error);

          // Re-enable the button and set its text back to "Resultats" in case of an error
          if (uploadButton) {
            uploadButton.textContent = 'Resultats';
            uploadButton.disabled = false;
            uploadButton.classList.remove('cursor-not-allowed'); // Remove the cursor-not-allowed class
          }
        });
    }

    dropArea.addEventListener('click', () => {
      fileInput.click();
    });
  </script>
  <script src="/js/flowbite.min.js"></script>
  <script src="/js/bundle.js"></script>
  <script src="/js/index.js"></script>
</body>

</html>