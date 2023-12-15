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

    .professors,
    .alumnes {
        margin: 20px 0;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        grid-gap: 20px;
        justify-items: center;
        align-items: center;
    }

    /* Exemple d'estil per a les imatges dels alumnes */
    .alumnes img {
        max-width: 100px;
        border-radius: 50%;
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
                <div class="professors">
                    <h2>Professors</h2>

                </div>
                <div class="alumnes">
                    <h2>Alumnes</h2>
                    <div class="grid">
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
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-3 ps-7 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>

            </form>

            <div class="download">
                <button>Descarregar</button>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            function carregarClasses() {
                const entries = {};

                $.ajax({
                    url: "/orles",
                    method: "GET",
                    data: entries,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        if (Array.isArray(data.orles)) {
                            const classesList = $("#classes-list");
                            classesList.empty();

                            data.orles.forEach(orla => {
                                const orlaElement = $(`
                                    <li class="mt-5">
                                        <a href="/${orla.id}">
                                            ${orla.grup_name}
                                        </a>
                                    </li>
                                `);
                                classesList.append(orlaElement);
                            });

                        } else {
                            console.error("Format de dades no vàlid");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }


            function carregarAlumnes(orlaId) {
                const alumnesContainer = $(".alumnes .grid");

                $.ajax({
                    url: `/orles?id=${orlaId}`,
                    method: "GET",
                    dataType: 'json',

                    success: function (data) {
                        console.log(data);
                        if (Array.isArray(data.alumnes)) {
                            alumnesContainer.empty();

                            data.alumnes.forEach(alumne => {
                                const alumneElement = $(`
                            <div>
                                <img src="${alumne.avatar}" alt="${alumne.name}">
                            </div>
                        `);
                                alumnesContainer.append(alumneElement);
                            });

                        } else {
                            console.error("Format de dades d'alumnes no vàlid");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            carregarClasses();

            $("#classes-list").on("click", "a", function (event) {
                event.preventDefault();
                const orlaId = $(this).attr("href").split('/').pop();
                carregarAlumnes(orlaId);
            });
        });


    </script>


    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
</body>

</html>