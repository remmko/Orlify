<!DOCTYPE html>
<html lang="ca">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <title>Recupera la contrasenya</title>

</head>



<body class="bg-gray-50 dark:bg-gray-900">

    <section>

        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full bg-white rounded-xl shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Canvia la contrasenya
                    </h1>

                    <form class="space-y-4 md:space-y-6" method ="POST" action="newPass">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Contrasenya
                            </label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••" required
                            >
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Repeteix la contrasenya
                            </label>
                            <input type="password" name="confirm-password" id="confirm-password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••" required
                            >
                        </div>

                       
                        <button type="check"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
    <script src="/js/index.js"></script>
    <!-- <script>
        // Password requirements
        document.addEventListener("DOMContentLoaded", function () {
        const regex =
            /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/])[a-zA-Z0-9-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]{6,13}$/;

        const form = document.querySelector("form");
        const passwordInput = document.getElementById("password");
        const confirmPasswordInput = document.getElementById("confirm-password");

        form.addEventListener("submit", function (event) {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (!regex.test(password)) {
                alert(
                    "La contrasenya ha de tenir entre 6 i 13 caràcters, almenys una majúscula, una minúscula, un número i un caràcter especial.",
                );
                event.preventDefault();
                return;
            }

            if (password !== confirmPassword) {
                alert("Les contrasenyes no coincideixen.");
                event.preventDefault();
                return;
                }
            });
        });
    </script> -->

</body>

</html>