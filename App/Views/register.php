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

<body class="bg-gray-50 dark:bg-gray-900">

    <section class="h-44">
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
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nom
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pere" required
                            >
                        </div>

                        <div>
                            <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Cognom
                            </label>
                            <input type="surname" name="surname" id="surname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ferrer" required
                            >
                        </div>

                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nom d'usuari
                            </label>
                            <input type="username" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="pere78" required
                            >
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Correu electrònic
                            </label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required
                            >
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Contrasenya
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required
                            >
                        </div>

                        <div>
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Confirmar contrasenya
                            </label>
                            <input type="confirm-password" name="confirm-password" id="confirm-password"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required=""
                            >
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