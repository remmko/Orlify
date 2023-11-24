<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/main.css">

</head>

<body>

    <header class="bg-gray-100 h-20">


        <nav class="border-none dark:bg-gray-900 ml-auto">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 mr-20">
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
                    </button>

                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg" id="user-dropdown">
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/login"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Iniciar Sessió
                                </a>
                            </li>

                            <li>
                                <a href="/register"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Registrar-se
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>

    </header>


    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
</body>

</html>
