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
                    <span class="sr-only">Close</span>
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

<div id="explanationModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Ajuda amb la pujada de fitchers CSV
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="errorLogModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Aqui es mostraran els errors que s'hagin produït durant la pujada del CSV.
                </p>
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
                    <span class="sr-only">Close</span>
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
                    ,,,,,student,pC
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