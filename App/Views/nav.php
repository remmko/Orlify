<header class="bg-gray-100 h-20 flex items-center justify-between w-full px-4">

    <!-- Logo a l'esquerra -->
    <a href="/" class="w-24 ml-20">
        <img src="/img/logo.png" alt="Orlify Logo">
    </a>

    <nav class="border-none dark:bg-gray-900 ml-auto">

        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 mr-20">

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <img class="w-8 h-8 rounded-full" src="
                            <?php
                            if (isset($_SESSION["auth"]) && $_SESSION["auth"] == "true") {
                                if ($_SESSION["img"] == "") {
                                    echo "img/user-solid.svg";
                                } else {
                                    echo $_SESSION["img"];
                                }
                            } else {
                                echo "img/user-solid.svg";
                            } ?>
                            " alt="user photo">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg"
                    id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <?php
                        if (isset($_SESSION["auth"]) && $_SESSION["auth"] == "true") { ?>
                            <li>
                                <a href="/personaldata"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Dades personals
                                </a>
                                <a href="/id" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Carnet
                                </a>
                            </li>
                            <?php
                            if ($_SESSION["role"] == "admin") { ?>
                                <li>
                                    <a href="/rdmUser"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Usuaris de prova
                                    </a>
                                </li>
                            <?php } elseif ($_SESSION["role"] == "teacher") { ?>
                                <li>
                                    <a href="/teacherpanel"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Panel de Professor
                                    </a>
                                </li>
                                <li>
                                    <a href="/CSVpanel"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Pujada de CSV
                                    </a>
                                </li>
                            <?php } elseif ($_SESSION["role"] == "manager") { ?>
                                <li>
                                    <a href="/managerpanel"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Panel d'equip directiu
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="/logout"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Logout
                                </a>
                            </li>
                        <?php } else { ?>
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
                        <?php } ?>
                    </ul>
                </div>
    </nav>
</header>