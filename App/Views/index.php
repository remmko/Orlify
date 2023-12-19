<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <link rel="manifest" href="manifest.json">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Orlify">
    <meta name="apple-mobile-web-app-title" content="Orlify">
    <meta name="theme-color" content="#7ACCE5">
    <meta name="msapplication-navbutton-color" content="#7ACCE5">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/id">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="manifest" href="data/manifest.json">
    <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-icon-180x180.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <title>Orlify</title>

</head>


<body>

    <?php require_once("nav.php") ?>

    <?php if (!$cookiesAccepted) { ?>
        <!-- MODAL COOKIES -->
        <section
            class="fixed max-w-md p-4 mx-auto bg-white border border-gray-200 dark:bg-gray-800 left-12 bottom-16 dark:border-gray-700 rounded-2xl cookiesModal">
            <h2 class="font-semibold text-gray-800 dark:text-white">🍪 Cookie Notice</h2>

            <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                Utilitzem cookies per millorar la teva experiència a la web. Si continues navegant, considerem que acceptes
                la nostra política de cookies.
            </p>

            <div class="flex items-center justify-between mt-4 gap-x-4 shrink-0">
                <button
                    class="text-xs bg-gray-900 font-medium rounded-lg hover:bg-gray-700 text-white px-4 py-2.5 duration-300 transition-colors focus:outline-none btnCookies">
                    Accept
                </button>
            </div>
        </section>
    <?php } ?>



    <div class="mx-auto mt-10 mr-10 ml-10 mb-5 grid-container">
        <!-- Side Navbar -->
        <div class="sidebar">
            <div class="left-menu text-xl">
                <ul>
                    <li>Orles Públiques</li>
                    <ul class="text-base" id="public-list">
                        <!-- Aquí es generarà dinàmicament la llista de classes públiques -->
                    </ul>


                    <li>Les teves orles</li>
                    <ul class="text-base" id="classes-list">
                        <li class="mt-5">
                            <!-- Aquí es generarà dinàmicament la llista de classes -->
                        </li>
                    </ul>
                </ul>
            </div>
        </div>



        <!-- Central -->
        <div class="central">
            <div class="container">
                <div class="year-promotion" id="year-promotion">
                    <!-- Aquí es carregarà dinàmicament l'any promoció -->
                </div>
                <div class="teachers">
                    <div class="grid2 p-5" id="teachers-grid">
                        <!-- Aquí es generarà dinàmicament la llista de professors -->
                    </div>
                </div>

                <div class="alumnes p-5">
                    <div class="grid" id="alumnes-grid">
                        <!-- Aquí es generarà dinàmicament la llista d'alumnes -->
                    </div>
                </div>
            </div>
        </div>



        <!-- Right Buttons -->
        <div class="right-buttons w-56">
            <div class="max-w-md mx-auto">
                <select id="alumnes-cerca"
                    class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 appearance-none bg-white">
                    <!-- Opcions es generaran aquí -->
                </select>

            </div>



            <div class="download">
                <button>Descarregar</button>
            </div>

        </div>
    </div>


    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
</body>

</html>