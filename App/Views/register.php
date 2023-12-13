<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="/camera.css">

    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <title>Registre</title>

</head>

<body class="bg-gray-50 dark:bg-gray-900 mt-5 mb-5">




    <!-- Main Section -->
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div
                class="w-full bg-white rounded-xl shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Crea el teu compte
                    </h1>

                    <form class="space-y-4 md:space-y-6" method="POST" enctype="multipart/form-data"
                        action="/checkregister">
                        <div>
                            <label for="name" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Nom
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pere" required>
                        </div>

                        <div>
                            <label for="surname" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Cognom
                            </label>
                            <input type="text" name="surname" id="surname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ferrer" required>
                        </div>

                        <div>
                            <label for="username"
                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Nom d'usuari
                            </label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="pere78" required>
                        </div>

                        <div>
                            <label for="email" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Correu electrònic
                            </label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required>
                        </div>

                        <div>
                            <label for="password"
                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Contrasenya
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div>
                            <label for="confirm-password"
                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Confirmar contrasenya
                            </label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div>
                            <label for="username"
                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Avatar
                            </label>
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Puja el teu avatar
                            </button>

                        </div>


                        <div id="groupselect">
                            <script>
                                getGroups();
                                function getGroups() {
                                    var groupselect = document.getElementById("groupselect");
                                    groupselect.innerHTML = "";
                                    groupselect.textContent = "Select your groups:";
                                    var groups = <?php echo json_encode($groups) ?>;
                                    for (var i = 0; i < groups.length; i++) {
                                        var formCheck = document.createElement("div");
                                        formCheck.setAttribute("class", "flex items-center");
                                        groupselect.appendChild(formCheck);
                                        var input = document.createElement("input");
                                        input.setAttribute("id", "checkbox-item-" + i);
                                        input.setAttribute("type", "checkbox");
                                        input.setAttribute("class", "w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500");
                                        input.setAttribute("name", "group" + i);
                                        formCheck.appendChild(input);
                                        var label = document.createElement("label");
                                        label.setAttribute("for", "checkbox-item-" + i);
                                        label.setAttribute("class", "ms-2 text-sm font-medium text-gray-900 dark:text-gray-300");
                                        label.textContent = groups[i]["grup_name"];
                                        formCheck.appendChild(label);
                                    }
                                }


                            </script>
                        </div>

                        <input type="submit" id="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 cursor-pointer"
                            value="Crear un compte">


                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Ja tens un compte?
                            <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Inicia sessió aquí
                            </a>
                        </p>





                        <!-- Avatar modal -->
                        <div id="default-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Seleccionar avatar
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div>
                                            <label for="upload"
                                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                                Pujar foto
                                            </label>
                                            <input type="file" name="file" id="foto">

                                            <br>

                                            <button data-modal-target="image-modal" data-modal-toggle="image-modal"
                                                class=" text-blue-700" type="button">
                                                Or Take a foto
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- Image Modal -->
                        <div id="image-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Seleccionar avatar
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="image-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div>
                                            <label for="upload"
                                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                                Foto instantània
                                            </label>

                                            <div style="display: flex; justify-content: space-between;">

                                                <div class="camera">
                                                    <video id="video">Video stream not available.</video>
                                                    <p id="startbutton" class="cursor-pointer">Take photo</p>
                                                </div>


                                                <div class="contentarea">

                                                    <input type="hidden" id="hidden" name="file2" value="">

                                                    <canvas id="canvas"></canvas>

                                                    <div class="output">
                                                        <img id="photo"
                                                            alt="The screen capture will appear in this box.">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        </div>
    </section>

    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
    <script src="/js/camera.js"></script>

</body>

</html>