<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

<style>
    .container {
        text-align: center;
    }

    img {
        border-radius: 15px;
        max-width: 100px;
        max-height: 100px;
        width: auto;
        height: auto;
        object-fit: cover;
    }

    .grid-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .grid-item {
        text-align: center;
        width: 100px;
    }

    .image-container {
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .grid-item p {
        font-size: 10px;
        margin: 0;
        margin-top: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
    }
</style>

<body class="overflow-hidden">

    <?php require_once("nav.php") ?>



    <div class="mx-auto p-10 grid-container">
        <!-- Side Navbar -->
        <div class="sidebar">
            <div class="left-menu text-xl">
                <ul>
                    <li>Classes Publiques</li>

                    <ul id="classes-list" class="text-base">
                        <!-- Aquí es carregaran dinàmicament les classes -->
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
        <div class="right-buttons">

            <form>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-3 ps-7 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>

            </form>

            <div class="download">
                <button>Descarregar</button>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
</body>

</html>