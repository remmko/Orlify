import $ from 'jquery';
import html2canvas from 'html2canvas';
import { jsPDF } from "jspdf";
import { Canvg } from 'canvg';

$(document).ready(function () {
    const regex =
        /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/])[a-zA-Z0-9-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]{6,13}$/;

    const form = $('form');
    const passwordInput = $('#password');
    const confirmPasswordInput = $('#confirm-password');
    const checkButton = $('#check');

    checkButton.on('click', function (event) {
        const password = passwordInput.val();
        const confirmPassword = confirmPasswordInput.val();

        if (!regex.test(password)) {
            Swal.fire({
                icon: 'error',
                title: 'Requisits de contrasenya',
                text: 'La contrasenya ha de tenir entre 6 i 13 caràcters, almenys una majúscula, una minúscula, un número i un caràcter especial.',
            });
            event.preventDefault();
            return;
        }

        if (password !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Les contrasenyes no coincideixen.',
            });
            event.preventDefault();
            return;
        }
    });

    function carregarClasses() {
        const entries = {};

        $.ajax({
            url: '/orles',
            method: 'GET',
            data: entries,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                if (Array.isArray(data.orles)) {
                    const classesList = $('#classes-list');
                    classesList.empty();

                    data.orles.forEach((orla) => {
                        const orlaElement = $(`
                                    <li class="mt-5">
                                        <a href="/${orla.id}">
                                            ${orla.grup_name}
                                        </a>
                                    </li>
                                `);
                        classesList.append(orlaElement);
                    });
                } else {
                    console.error('Format de dades no vàlid');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function carregarYearPromotion(orlaId) {
        const yearPromotionContainer = $('#year-promotion');

        $.ajax({
            url: `/orles?id=${orlaId}`,
            method: 'GET',
            dataType: 'json',

            success: function (data) {
                console.log(data);
                if (Array.isArray(data.orles) && data.orles.length > 0) {
                    const orlaSeleccionada = data.orles.find(
                        (orla) => orla.id === parseInt(orlaId),
                    );

                    if (orlaSeleccionada && orlaSeleccionada.creation_year) {
                        const yearPromotion = orlaSeleccionada.creation_year;

                        const yearPromotionElement = $(`
                        <h1 class="text-3xl font-bold text-center mt-5">Promoció del ${yearPromotion}</h1>
                    `);

                        yearPromotionContainer
                            .empty()
                            .append(yearPromotionElement);
                    } else {
                        console.error("No s'ha trobat l'any de la promoció");
                    }
                } else {
                    console.error(
                        'Format de dades de la orla no vàlid o orla no trobada',
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function carregarAlumnes(orlaId) {
        const alumnesContainer = $('.alumnes .grid');

        $.ajax({
            url: `/orles?id=${orlaId}`,
            method: 'GET',
            dataType: 'json',

            success: function (data) {
                if (Array.isArray(data.alumnes)) {
                    const alumnesOrdenats = data.alumnes.sort((a, b) =>
                        a.last_name > b.last_name ? 1 : -1,
                    );
                    alumnesContainer.empty();

                    let count = 0;
                    let currentRow;

                    alumnesOrdenats.forEach((alumne, index) => {
                        if (count % 7 === 0) {
                            currentRow = $("<div class='grid-row'></div>");
                            alumnesContainer.append(currentRow);
                        }

                        const alumneElement = $(`
                                    <div class="grid-item">
                                        <div class="image-container">
                                            <img src="${alumne.avatar}" alt="${alumne.name}">
                                        </div>
                                        <p>${alumne.last_name}, <strong>${alumne.name}</strong></p>
                                    </div>
                                `);

                        currentRow.append(alumneElement);
                        count++;
                    });
                } else {
                    console.error("Format de dades d'alumnes no vàlid");
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function carregarTeachers(orlaId) {
        const teachersContainer = $('#teachers-grid');

        $.ajax({
            url: `/orles?id=${orlaId}`,
            method: 'GET',
            dataType: 'json',

            success: function (data) {
                if (Array.isArray(data.teachers)) {
                    const teachersOrdenats = data.teachers.sort((a, b) =>
                        a.last_name > b.last_name ? 1 : -1,
                    );
                    teachersContainer.empty();

                    let count = 0;
                    let currentRow;

                    teachersOrdenats.forEach((teacher, index) => {
                        if (count % 6 === 0) {
                            // Canvia el nombre 5 per 6 per mostrar 6 imatges per fila
                            currentRow = $("<div class='grid-row'></div>");
                            teachersContainer.append(currentRow);
                        }

                        const teacherElement = $(`
                                    <div class="grid-item">
                                        <div class="image-container">
                                            <img src="${teacher.avatar}" alt="${teacher.name}">
                                        </div>
                                        <p>${teacher.last_name}, <strong>${teacher.name}</strong></p>
                                    </div>
                                `);

                        currentRow.append(teacherElement);
                        count++;
                    });
                } else {
                    console.error('Format de dades de professors no vàlid');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    carregarClasses();

    $('#classes-list').on('click', 'a', function (event) {
        event.preventDefault();
        const orlaId = $(this).attr('href').split('/').pop();
        carregarYearPromotion(orlaId);
        carregarAlumnes(orlaId);
        carregarTeachers(orlaId);
    });
});

//pdf
document.getElementById('pdfButton').addEventListener('click', function () {
    const paperSize = document.getElementById('paperSize').value;
    const centralDiv = document.querySelector('.central');

    // Use html2canvas to capture the content of the centralDiv
    html2canvas(centralDiv).then(canvas => {
        // Create a cloned div for PDF generation
        const clonedDiv = centralDiv.cloneNode(true);

        // Apply different styles for PDF
        clonedDiv.style.width = '100%'; // Adjust the width as needed
        clonedDiv.style.height = '100%'; // Adjust the height as needed
        clonedDiv.style.backgroundColor = 'white'; // Set background color to white
        clonedDiv.style.display = 'flex';
        clonedDiv.style.justifyContent = 'center';
        clonedDiv.style.alignItems = 'center';

        // Process SVG images using canvg (optional)
        const svgs = clonedDiv.querySelectorAll('svg');
        svgs.forEach((svg) => {
            // Create a canvas for the SVG
            const svgCanvas = document.createElement('canvas');
            svgCanvas.width = svg.getAttribute('width') || 100; // Default width if not specified
            svgCanvas.height = svg.getAttribute('height') || 100; // Default height if not specified

            // Replace the SVG with the canvas
            svg.parentNode.replaceChild(svgCanvas, svg);

            // Use canvg to render the SVG on the canvas
            canvg(svgCanvas, new XMLSerializer().serializeToString(svg));
        });

        // Create a new jsPDF instance
        const pdf = new jsPDF({
            unit: 'mm',
            format: paperSize,
            orientation: 'landscape'
        });

        // Convert the canvas to an image
        const imgData = canvas.toDataURL('image/jpeg');

        // Add the image to the PDF
        pdf.addImage(imgData, 'JPEG', 0, 0, pdf.internal.pageSize.getWidth(), pdf.internal.pageSize.getHeight());

        // Save or open the PDF
        pdf.save('output.pdf');
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
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => {
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
        .catch((error) => {
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

