<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/main.css">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Carnet">
    <meta name="apple-mobile-web-app-title" content="Orlify">
    <meta name="theme-color" content="#7ACCE5">
    <meta name="msapplication-navbutton-color" content="#7ACCE5">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/id">
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
    body {
        background: linear-gradient(135deg, #9c75f7, #ce74f1);
    }

    @media screen and (orientation: portrait) {
        body {
            flex-direction: column;
        }

        .profile-info {
            text-align: center;
        }
    }

    @media screen and (orientation: landscape) {
        body {
            flex-direction: row;
        }

        .profile-info {
            text-align: left;
        }
    }
</style>

<body class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-screen-md bg-white p-8 rounded-lg shadow-md">
        <div class="flex flex-col items-center space-y-4">
            <div class="flex-shrink-0 w-32">
                <img src="<?= $user["avatar"] ?>" alt="Profile Image" class="rounded-full w-full h-full">
            </div>
            <div class="text-center">
                <p class="text-2xl text-gray-800 mb-2">Nom:
                    <b>
                        <?php echo $user["name"] ?>
                    </b>
                </p>
                <p class="text-2xl text-gray-800 mb-2">Cognom:
                    <b>
                        <?php echo $user["last_name"] ?>
                    </b>
                </p>
                <p class="text-2xl text-gray-800">Rol:
                    <b>
                        <?php
                        $roleMapping = [
                            'admin' => 'Administrador',
                            'teacher' => 'Professor',
                            'student' => 'Estudiant'
                        ];
                        echo $roleMapping[$user["role"]];
                        ?>
                    </b>
                </p>
                <p class="text-2xl text-gray-800">Classe/s:
                    <?php
                    $orles_count = count($orles);
                    foreach ($orles as $key => $orla) {
                        echo "<b>" . $orla["grup_name"] . "</b>";
                        if ($key < $orles_count - 1) {
                            echo ", ";
                        }
                    }
                    ?>

                </p>
            </div>
        </div>
    </div>


    <script>
        if ("serviceWorker" in navigator) {
            self.addEventListener("load", async () => {
                const container = navigator.serviceWorker;
                if (container.controller === null) {
                    const reg = await container.register("js/service-worker.js");
                }
            });
        }
    </script>


</body>