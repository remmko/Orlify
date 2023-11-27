<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <title>Registre</title>

</head>

<body class="bg-gray-50 dark:bg-gray-900 mt-5">

    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div
                class="w-full bg-white rounded-xl shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Crea el teu compte
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="name" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Nom
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pere" required
                            >
                        </div>

                        <div>
                            <label for="surname" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Cognom
                            </label>
                            <input type="surname" name="surname" id="surname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ferrer" required
                            >
                        </div>

                        <div>
                            <label for="username" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Nom d'usuari
                            </label>
                            <input type="username" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="pere78" required
                            >
                        </div>

                        <div>
                            <label for="email" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Correu electrònic
                            </label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required
                            >
                        </div>

                        <div>
                            <label for="password" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Contrasenya
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required
                            >
                        </div>

                        <div>
                            <label for="confirm-password"
                                class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-white">
                                Confirmar contrasenya
                            </label>
                            <input type="confirm-password" name="confirm-password" id="confirm-password"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required=""
                            >
                        </div>


                        <!-- Dropdown menu -->
                        <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox1" class="float-left text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            DAW 
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <div id="dropdownDefaultCheckbox1" class="z-10 hidden w-fit bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            DAW1
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            DAW2
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>


                        <!-- Dropdown menu -->
                        <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox2" class="float-left text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            TIL 
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <div id="dropdownDefaultCheckbox2" class="z-10 hidden w-fit bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            TIL1
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <input id="checkbox-item-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            TIL2
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Crear un compte
                        </button>
 
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Ja tens un compte?
                            <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Inicia sessió aquí
                            </a>
                        </p>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>



    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>

</body>

</html>



<!-- <div id="groupselect">

                <script>
                    getGroups();
                    function getGroups(){
                        var groupselect = document.getElementById("groupselect");
                        groupselect.innerHTML="";
                        groupselect.textContent="Select your groups:";
                        var groups = <?php // echo json_encode($groups); ?>;
                        for(var i = 0; i<groups.length; i++){
                            var formCheck = document.createElement("div");
                            formCheck.setAttribute("class","form-check");
                            groupselect.appendChild(formCheck);
                            var input = document.createElement("input");
                            input.setAttribute("class","form-check-input");
                            input.setAttribute("type","checkbox");
                            input.setAttribute("id","flexCheckDefault");
                            input.setAttribute("name","group"+i);
                            formCheck.appendChild(input);
                            var label = document.createElement("label");
                            label.setAttribute("class","form-check-label");
                            label.setAttribute("for","flexCheckDefault");
                            label.textContent = groups[i]["grup_name"];
                            formCheck.appendChild(label);
                        }
                    }
                  
             
                </script>
               
                
            </div> -->