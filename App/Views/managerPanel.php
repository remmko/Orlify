<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <title>Panel d'Equip Directiu</title>

</head>


<body>
    <?php require_once "nav.php" ?>


    <div class="create-orla">
        <div class="bg-white max-w-2xl shadow-2xl overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Informació Personal
                </h3>
            </div>


            <div class="border-t border-gray-200">
                <form action="neworla" method="post">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nom
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="info">
                                    <input type="text" name="name" class="border border-black rounded-sm">
                                </div>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Data de creació
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="info">
                                    <input type="date" name="date" class="border border-black rounded-sm">
                                </div>
                            </dd>
                        </div>
                    </dl>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm sm:text-base md:text-md px-3 py-1 mt-3 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block mx-auto">
                        Afegir
                    </button>
                </form>
            </div>
        </div>
    </div>





    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
    <script src="/js/index.js"></script>

</body>

</html>