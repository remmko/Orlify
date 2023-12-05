import $ from "jquery";

import hola from "./hola.js";

import { Example, obj } from "./example.ts";

$(function () {
  hola();
});

// Password requirements
$(document).ready(function () {
  const regex =
    /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/])[a-zA-Z0-9-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]{6,13}$/;

  const form = $("form");
  const passwordInput = $("#password");
  const confirmPasswordInput = $("#confirm-password");

  form.on("check", function (event) {
    const password = passwordInput.val();
    const confirmPassword = confirmPasswordInput.val();

    if (!regex.test(password)) {
      alert(
        "La contrasenya ha de tenir entre 6 i 13 caràcters, almenys una majúscula, una minúscula, un número i un caràcter especial.",
      );
      event.preventDefault();
      return;
    }

    if (password !== confirmPassword) {
      alert("Les contrasenyes no coincideixen.");
      event.preventDefault();
      return;
    }
  });
});

// Pujada d'arxius del CSVpanel

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