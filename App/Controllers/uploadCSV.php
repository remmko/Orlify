<?php
function ctrlUploadCSV($request, $response, $container)
{
    $fitcher = $request->get("FILES", "fitcher");
    $users = $container->get("users");

    if (file_exists($fitcher["tmp_name"])) {
        // Read the file contents
        $fileContents = file_get_contents($fitcher["tmp_name"]);

        if ($fileContents === false) {
            echo "Error llegint el fitxer.";
        } else {
            // Output the parsed CSV data
            echo "<pre>";

            $csvData = str_getcsv($fileContents, "\n");

            $i = 0;
            $voidRole = false;
            foreach ($csvData as $row) {
                // Parse each row into an array of values
                $rowData = str_getcsv($row);
                $i++;
                // Check if 'password' exists
                if (count($rowData) >= 3) {
                    $password = $rowData[2]; // Assuming 'password' is at index 2

                    // Additional check for password
                    if ($password === 'null') {
                        // Handle the case where password is null, e.g., execute a different query
                        echo "Error a la fila $i: La contrasenya és nul·la. Tractant aquest cas de manera diferent...\n";
                        // Add your logic here
                        continue;  // Skip the rest of the loop for this row
                    }
                } else {
                    echo "Error a la fila $i: Fila CSV no vàlida. Dades insuficients.\n";
                    continue;  // Skip the rest of the loop for this row
                }

                // Check if 'username', 'email', and 'role' exist and meet the criteria
                if (count($rowData) >= 3) {
                    $username = $rowData[5]; // Assuming 'username' is at index 5
                    $email = $rowData[3];    // Assuming 'email' is at index 3
                    $role = $rowData[4];     // Assuming 'role' is at index 4

                    $isUsernameUnique = $users->isUsernameUnique($username);
                    $isEmailUnique = $users->isEmailUnique($email);

                    if ($role == '') {
                        echo "El rol és buit, assumint grup adicional per a l'estudiant '$username'.\n";
                        $voidRole = true;
                    } elseif ($role !== 'student') {
                        if ($role == 'role') {
                            continue;  // Skip the rest of the loop for this row
                        }
                        echo "Error a la fila $i: rol '$role' no vàlid. Només s'accepta el rol d'estudiant.\n";
                        continue;  // Skip the rest of the loop for this row
                    }

                    // Perform simple validations
                    if (!$isUsernameUnique && $voidRole == false) {
                        echo "Error a la fila $i: El nom d'usuari '$username' ja existeix.\n";
                        continue;  // Skip the rest of the loop for this row
                    }

                    if (!$isEmailUnique && $voidRole == false) {
                        echo "Error a la fila $i: el correu electrònic '$email' ja existeix.\n";
                        continue;  // Skip the rest of the loop for this row
                    }

                    
                } else {
                    echo "Error a la fila $i: fila CSV no vàlida. Dades insuficients.\n";
                    continue;  // Skip the rest of the loop for this row
                }

                if ($voidRole) {
                    $voidRole = $users->voidRole($rowData);
                    if ($voidRole) {
                        echo "L'usuari '$username' a la fila $i s'ha afegit correctament a la classe '$row[6]'.\n";
                    } else {
                        echo "Error a la fila $i: l'usuari '$username' no s'ha pogut afegir a la classe '$row[6]'.\n";
                        continue;
                    }
                } else {
                    $dataResult = $users->uploadCSVUserData($rowData);
                    if ($dataResult) {
                        echo "L'usuari '$username' a la fila $i s'ha afegit correctament.\n";
                    } else {
                        echo "Error a la fila $i: no s'ha pogut afegir l'usuari '$username'.\n";
                        continue;
                    }
                    echo "<br>";
                }
                $voidRole = false;
            }

            echo "</pre>";
        }
    } else {
        echo "El fitxer no existeix.";
    }

    $response->setTemplate("CSVpanel.php");
    return $response;
}
