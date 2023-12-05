<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pujada CSV</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<style>
  .bg-custom {
    background-color: #1a4bd0;
  }
</style>

<body class="bg-gray-100 overflow-hidden">
  <?php require_once("nav.php") ?>
  <div class="items-center justify-center">

    <?php require_once("modalsCSVPanel.php") ?>

    <div class="flex items-center justify-center h-screen">
      <div class="w-full max-w-3xl bg-white p-8 shadow-md">
        <p class="text-xl font-semibold mb-4">Puja un fitcher CSV</p>

        <form id="uploadForm" action="upload" method="post" enctype="multipart/form-data">
          <label for="file" class="block mt-4 mb-2">Escull un fitcher CSV</label>

          <div id="dropArea" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-500 flex items-center justify-center rounded-xl mb-4">
            <img src="/img/subir-archivo.svg" alt="Imatge de pujada d'elements" class="w-24 mb-4" draggable="false">
            <span id="dropText" class="">Seleccioneu un fitxer o arrossegueu-lo i deixeu-lo anar aquí</span>
            <input type="file" aria-label="Entrada fitchers CSV" name="fitcher" id="fileInput" class="hidden" accept=".csv">
          </div>

          <div id="fileList" class="mt-4 text-gray-700"></div>
        </form>

        <!-- Modal toggle -->
        <div class="flex space-x-4 mt-4">
          <button data-modal-target="errorLogModal" data-modal-toggle="errorLogModal" id="errorModalButton" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Resultats
          </button>
          <button data-modal-target="explanationModal" data-modal-toggle="explanationModal" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Ajuda
          </button>
          <button data-modal-target="exampleModal" data-modal-toggle="exampleModal" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Exemple CSV
          </button>
          <button data-modal-target="aliasModal" data-modal-toggle="aliasModal" class="block text-white bg-custom hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-custom dark:focus:ring-blue-800" type="button">
            Àlies de les classes
          </button>
        </div>

      </div>
    </div>


  </div>

  <script src="/js/flowbite.min.js"></script>
  <script src="/js/bundle.js"></script>
  <script src="/js/index.js"></script>
</body>

</html>