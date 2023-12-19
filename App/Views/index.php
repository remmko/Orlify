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
    <meta name="msapplication-starturl" content="/">
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



    <div class="mx-auto mt-10 mr-10 ml-10 mb-5 grid-container">
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