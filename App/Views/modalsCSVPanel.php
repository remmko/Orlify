<!-- Main modal -->
<div id="errorLogModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Log d'errors
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="errorLogModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tancar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p id="errorLogModalText" class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Aqui es mostraran els errors que s'hagin produït durant la pujada del CSV.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="errorLogModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Acceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="explanationModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
    <div class="relative p-4 w-full max-w-2xl h-full overflow-y-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-full flex flex-col">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Ajuda amb la pujada de fitchers CSV
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="explanationModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tancar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex-1 p-4 md:p-5 overflow-y-auto">
                <p class="text-l font-semibold text-gray-900 dark:text-white">Què és un fitxer CSV?</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Un fitxer CSV (valors separats per comes) és una manera senzilla i àmpliament utilitzada d'emmagatzemar dades tabulars, com ara un full de càlcul o una base de dades, en text sense format. S'anomena “separat per comes” perquè els valors del fitxer estan separats per comes.
                </p>
                <p class="text-l font-semibold text-gray-900 dark:text-white">Com puc fer un fitcher CSV?</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Podeu crear un fitxer CSV utilitzant un editor de text, com el Bloc de notes de Windows, o un editor de fulls de càlcul, com el Microsoft Excel. El fitxer CSV ha de tenir una extensió de fitxer .csv. Per exemple, podeu anomenar el fitxer "students.csv".
                </p>
                <p class="text-l font-semibold text-gray-900 dark:text-white">Per què CSV?</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Els fitxers CSV són fàcils de crear i llegir per humans. Són útils per a l'emmagatzematge de dades tabulars i són compatibles amb moltes aplicacions. Per exemple, podeu importar el fitxer CSV a una base de dades o un full de càlcul, com el Microsoft Excel.
                </p>
                <p class="text-l font-semibold text-gray-900 dark:text-white">Hi han regles?</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Sí, hi han regles. El fitxer CSV ha de tenir una fila d'encapçalament que defineixi els noms de columna per a totes les dades de la taula. Aquesta fila d'encapçalament ha d'estar separada per comes i ha de contenir els noms de columna en el mateix ordre que les dades de la taula. El fitxer CSV ha de tenir una fila per a cada fila de dades de la taula. Aquestes files han d'estar separades per comes i han de contenir les dades de la taula en el mateix ordre que els noms de columna de la fila d'encapçalament.
                </p>
                <p class="text-l font-semibold text-gray-900 dark:text-white">Com construeixo un el fitcher CSV per aquest cas?</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Al botó anomenat "Exemple CSV" es mostra un exemple de com ha de ser el fitxer CSV per aquest cas. Aquest exemple es pot copiar i enganxar i utilitzar com a plantilla per a la creació del fitxer CSV. En aquest cas hi tenim 7 columnes:
                </p>

                <ul class="list-disc space-y-2">
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Name</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Nom del alumne</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Last Name</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Cognoms del alumne</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Password Hash</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Contrassenya en text pla</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Email</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">E-Mail proporcionat per l'alumne</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Role</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Rol de l'alumne. Sempre ha de ser ‘student’. És una columna perquè, en la seva absència s'utilitza per afegir grups addicionals. Això s'explica més endavant.</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Username</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Nom d'usuari. Si hi ha un nom d'usuari que s'utilitza a un altre lloc com pot ser el Moodle s'aconsella utilitzar aquest nom d'usuari. En el cas que no hi hagi un nom d'usuari existent s'aconsella usar la mateixa manera de nomenar que es mostra a l'exemple.</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Alias</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Alias de la classe a la que es vol afegir l'alumne. Al botó 'Alias' trobaràs un llistat complert dels alias que existeixen a aquest moment.</li>
                    </ul>
                </ul>

                <p class="text-l font-semibold text-gray-900 dark:text-white">Com afegeixo grups addicionals?</p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Per afegir grups addicionals a un alumne existeixen 2 maneres:
                </p>

                <ul class="list-disc space-y-2">
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Usuari ja existent</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">L'usuari ja existeix, i per això no fa falta cap precaució especial.</li>
                    </ul>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Afegint l'usuari al mateix arxiu</li>
                    <ul class="list-none ml-4 space-y-2">
                        <li class="ml-4 pl-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Aquest mètode és possible, però s'ha de ser molt curós donat que només es podrà afegir el grup addicional si l'usuari ja existeix.</li>
                    </ul>
                </ul>

                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Tenint en compte aquestes precaucions, per afegir un grup addicional a un alumne s'ha de seguir els següents passos:
                </p>

                <ul class="list-disc space-y-2">
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Mantenir buits tots els camps extres i només emplenar els camps de nom d'usuari i el camp d'“Alias”.</li>
                    <li class="ml-4 text-base leading-relaxed text-gray-500 dark:text-gray-400">Mantenir les comes de separació entre camps, encara que els camps siguin buits.</li>
                </ul>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="explanationModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Acceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="exampleModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
    <div class="relative p-4 w-full max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Exemple de fichier CSV
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="exampleModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tancar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 max-h-[calc(100vh-10rem)] overflow-y-auto">
                <h4 class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Format de text
                </h4>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    name,last_name,password_hash,email,role,username,alias <br>
                    Peter,Parker,contrassenya1,pparker@example.com,student,pparker33,mC <br>
                    Mary Jane,Watson,contrassenya2,mjwatson@example.com,student,mjwatson40,clC <br>
                    Otto Gunther,Octavius,contrassenya3,goctopus@example.com,student,drOctopus,clC <br>
                    ,,,,,pparker33,pC
                </p>
                <h4 class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Format de taula
                </h4>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                <div class="max-w-screen-lg mx-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-100 border-b">Name</th>
                                <th class="py-2 px-4 bg-gray-100 border-b">Last Name</th>
                                <th class="py-2 px-4 bg-gray-100 border-b">Password Hash</th>
                                <th class="py-2 px-4 bg-gray-100 border-b">Email</th>
                                <th class="py-2 px-4 bg-gray-100 border-b">Role</th>
                                <th class="py-2 px-4 bg-gray-100 border-b">Username</th>
                                <th class="py-2 px-4 bg-gray-100 border-b">Alias</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b">Peter</td>
                                <td class="py-2 px-4 border-b">Parker</td>
                                <td class="py-2 px-4 border-b">contrassenya1</td>
                                <td class="py-2 px-4 border-b">pparker@example.com</td>
                                <td class="py-2 px-4 border-b">student</td>
                                <td class="py-2 px-4 border-b">pparker33</td>
                                <td class="py-2 px-4 border-b">mC</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b">Mary Jane</td>
                                <td class="py-2 px-4 border-b">Watson</td>
                                <td class="py-2 px-4 border-b">contrassenya2</td>
                                <td class="py-2 px-4 border-b">mjwatson@example.com</td>
                                <td class="py-2 px-4 border-b">student</td>
                                <td class="py-2 px-4 border-b">mjwatson40</td>
                                <td class="py-2 px-4 border-b">clC</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b">Otto Gunther</td>
                                <td class="py-2 px-4 border-b">Octavius</td>
                                <td class="py-2 px-4 border-b">contrassenya3</td>
                                <td class="py-2 px-4 border-b">goctopus@example.com</td>
                                <td class="py-2 px-4 border-b">student</td>
                                <td class="py-2 px-4 border-b">drOctopus</td>
                                <td class="py-2 px-4 border-b">clC</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b"></td>
                                <td class="py-2 px-4 border-b"></td>
                                <td class="py-2 px-4 border-b"></td>
                                <td class="py-2 px-4 border-b"></td>
                                <td class="py-2 px-4 border-b"></td>
                                <td class="py-2 px-4 border-b">pparker33</td>
                                <td class="py-2 px-4 border-b">clC</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="exampleModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Acceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="aliasModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Àlies de les classes
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="aliasModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tancar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <?php 
                        foreach ($groups as $group) {
                            echo $group["alias"] . " - " . $group["grup_name"] . "<br>";
                        }
                    ?>
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="aliasModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Acceptar</button>
            </div>
        </div>
    </div>
</div>