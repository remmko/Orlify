<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generació d'usuaris de prova</title>
    <link rel="stylesheet" href="/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<style>
    .bg-custom {
        background-color: #1a4bd0;
    }
</style>

<body class="bg-gray-100 overflow-hidden">
    <?php require_once("nav.php") ?>

    <div id="testUsersModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
        <div class="relative p-4 w-full max-w-4xl h-full overflow-y-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-full flex flex-col max-w-full">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Usuaris de testeig ja existents
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="testUsersModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tancar</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="flex-1 p-4 md:p-5 overflow-y-auto">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom d'usuari</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correu</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contrassenya</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            foreach ($testUsers as $testUser) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>" . $testUser["username"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>" . $testUser["email"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'> testing10 </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="testUsersModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Acceptar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center h-screen">
        <div class="relative w-full max-w-xl bg-white p-8 shadow-md">
            <div id="userDetailsSquare" class="flex flex-col items-center justify-center">
                <img id="userAvatar" class="w-24 h-24 rounded-full mb-2" src="img/unknown.png" alt="User Avatar">
                <p id="userName" class="text-sm"></p>
                <p id="username" class="text-sm"></p>
                <p id="userPassword" class="text-sm"></p>
            </div>
            <form id="userForm" action="">
                <label for="userType">Escull el rol:</label>
                <select id="userType" name="userType" class="block w-full p-2 border border-gray-300 rounded-md mt-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <option value="student">Estudiant</option>
                    <option value="teacher">Professor</option>
                </select>
                <!-- Add a hidden input field to store form data -->
                <input type="hidden" id="formData" name="form" value="">
                <input type="button" id="randomUserGeneratorButton" class="block w-full mt-4 text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" value="Generar usuari">
            </form>
            <br>

            <form id="checkboxForm" action="#" method="post">
                <label>Selecciona Els grups:</label>
                <table class="w-full mt-4">
                    <?php
                    $i = 0;
                    echo '<tr>';
                    foreach ($grups as $grup) {
                        echo "<td><input type='checkbox' id='grup" . $grup['id'] . "' name='grups[]' value='" . $grup['id'] . "' class='mr-1'></td>";
                        echo "<td><label for='grup" . $grup['id'] . "' class='mr-4'>" . $grup['grup_name'] . "</label></td>";
                        if ($i == 2) {
                            echo '</tr>';
                            echo '<tr>';
                        }
                        $i++;
                    }
                    echo '</tr>';
                    ?>
                </table>
            </form>

            <button id="uploadRandomGeneratedUser" class="block w-full mt-4 text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">Pujar dades</button>

            <button data-modal-target="testUsersModal" data-modal-toggle="testUsersModal" id="errorModalButton" class="block w-full mt-4 text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
                Usuaris ja creats
            </button>
        </div>
    </div>




    <script>
        var usuariRandom = {};

        document.getElementById("randomUserGeneratorButton").addEventListener("click", function() {
            var userType = document.getElementById("userType").value;

            var formData = {
                userType: userType
            };

            $.ajax({
                url: 'https://randomuser.me/api/',
                dataType: 'json',
                success: function(data) {
                    usuariRandom[userType] = data.results[0];

                    // Show user details square
                    showUserDetails(userType);
                }
            });
        });


        document.getElementById("uploadRandomGeneratedUser").addEventListener("click", function() {
            var userType = document.getElementById("userType").value;
            var selectedRoles = Array.from(document.querySelectorAll('input[name="grups[]"]:checked')).map(checkbox => checkbox.value);

            if (usuariRandom[userType]) {
                var dataToUpload = {
                    form: {
                        userType: userType,
                        grups: selectedRoles
                    },
                    randomUser: usuariRandom[userType]
                };

                $.ajax({
                    type: 'POST',
                    url: 'uploadRdmUser',
                    contentType: 'application/json',
                    data: JSON.stringify(dataToUpload),
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Dades pujades correctament!',
                            text: 'Les dades s\'han pujat correctament.'
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error pujant les dades: ' + error
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'No hi ha usuari generat',
                    text: 'Clica el botó "Generar usuari" per generar un usuari aleatori. Si ja has fet clic i no s\'ha generat cap usuari, torna a clicar el botó.',
                });
            }
        });


        function showUserDetails(userType) {
            var userDetailsSquare = document.getElementById("userDetailsSquare");
            var userAvatar = document.getElementById("userAvatar");
            var usrName = document.getElementById("userName");
            var username = document.getElementById("username");
            var userPassword = document.getElementById("userPassword");

            // Set user details
            usrName.innerHTML = "<strong>Nom:</strong> " + usuariRandom[userType].name.first + " " + usuariRandom[userType].name.last;
            username.innerHTML = "<strong>Nom d\'usuari:</strong> " + usuariRandom[userType].login.username;
            userPassword.innerHTML = "<strong>Contrassenya:</strong> testing10";

            // Set user avatar
            userAvatar.src = usuariRandom[userType].picture.large;

            // Show user details square
            userDetailsSquare.classList.remove("hidden");
        }
    </script>




    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
</body>

</html>