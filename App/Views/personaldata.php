<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <title>Alumne</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<style>
    .bg-custom {
        background-color: #1a4bd0;
    }
</style>

<body>

    <?php require_once("nav.php") ?>

    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Seleccionar avatar
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <form action="changeImage" method="post" enctype="multipart/form-data">
                            <label for="file" class="block mt-4 mb-2">Escull una imatge</label>

                            <div id="dropArea1" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-500 flex items-center justify-center rounded-xl mb-4">
                                <img src="/img/subir-archivo.svg" alt="Imatge de pujada d'elements" class="w-24 mb-4" draggable="false">
                                <span id="dropText1" class="">Seleccioneu una imatge o arrossegueu-la i deixeu-la anar aquí</span>
                                <input type="file" aria-label="Entrada de imatges" name="avatar" id="avatar" class="hidden" accept="image/">
                            </div>

                            <div id="fileNameDisplay" class="mt-2 text-gray-700"></div>

                            <br>

                            <button data-modal-target="image-modal" data-modal-toggle="image-modal" class=" text-blue-700" type="button">
                                Or Take a foto
                            </button>

                            <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-lg text-sm px-5 py-2 mt-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Guardar
                            </button>
                        </form>



                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="main">
        <div class="bg-white max-w-2xl shadow-2xl overflow-hidden sm:rounded-lg principal">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Informació Personal
                </h3>
            </div>

            <form action="updateInfoUser" method="post" enctype="multipart/form-data">

                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nom
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="info">
                                    <input type="name" name="name" value="<?= $result["name"] ?>" class="image-input bg-inherit">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Cognom
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="info">
                                    <input type="last_name" name="last_name" value="<?= $result["last_name"] ?>" class="image-input">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nom d'usuari
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= $result["username"] ?>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Correu electrònic
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= $result["email"] ?>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Rol
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?= $result["role"] ?>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Avatar
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                                <?php
                                if ($result["avatar"] == NULL) {
                                    echo "<p>No hi ha avatar</p>";
                                } else { ?>
                                    <img src="<?= $result["avatar"] ?>" alt="Avatar" class="h-32">
                                <?php } ?>
                            </dd>

                            <dd>
                                <!-- Modal toggle -->
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Editar
                                </button>
                            </dd>

                            <!-- Form buton -->
                            <dd class="flex mt-4">
                                <input type="submit" data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-lg text-xs px-3 py-1 text-center cursor-pointer dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Confirma">
                            </dd>
                        </div>
                    </dl>
                </div>
            </form>
        </div>
    </div>


    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
    <script>
        const dropArea = document.getElementById('dropArea1');
        const dropText = document.getElementById('dropText1');
        const fileInput = document.getElementById('avatar');
        const fileNameDisplay = document.getElementById('fileNameDisplay');

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('border', 'border-solid', 'bg-custom', 'text-white');
            dropArea.classList.remove('border-dashed');
            dropText.textContent = 'Drop';
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('bg-custom', 'text-white');
            dropArea.classList.add('border-dashed');
            dropText.textContent = 'Seleccioneu una imatge o arrossegueu-la i deixeu-la anar aquí';
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-custom', 'text-white');
            dropArea.classList.add('border-dashed');
            dropText.textContent = 'Seleccioneu una imatge o arrossegueu-la i deixeu-la anar aquí';

            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        fileInput.addEventListener('change', () => {
            const files = fileInput.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            for (const file of files) {
                if (file.type.startsWith('image/')) {
                    // Display the file name in a separate element
                    fileNameDisplay.textContent = `Selected File: ${file.name}`;
                    fileInput.files = files;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fitcher no valid',
                        text: 'Si us plau, selecciona una imatge',
                    });
                }
            }
        }

        dropArea.addEventListener('click', () => {
            fileInput.click();
        });
    </script>

</body>

</html>