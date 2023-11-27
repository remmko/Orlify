<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <title>Index</title>

</head>

<body class="overflow-hidden">

    <?php require_once("nav.php") ?>



    <div class="mx-auto p-10 grid-container">
        <!-- Side Navbar -->
        <div class="sidebar">
            <div class="left-menu text-xl">
                <ul>
                    <li>Classes Publiques</li>
                    <ul class="public text-base">
                        <li>DAW2</li>
                    </ul>
                    <br>
                </ul>
            </div>
        </div>
        

        <!-- Central -->
        <div class="central">
            
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

            <div class="edit">
                <button>Editar</button>
            </div>

            <div class="template">
                <button>Canviar plantilla</button>
            </div>

            <div class="download">
                <button>Descarregar</button>
            </div>

        </div>
    </div>




    <script src="/js/bundle.js"></script>
</body>

</html>