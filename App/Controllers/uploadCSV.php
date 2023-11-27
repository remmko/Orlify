<?php
function ctrlUploadCSV($request, $response, $container)
{
    $fitcher = $request->get("FILES", "fitcher");

    $users = $container->get("users");

    if (file_exists($fitcher["tmp_name"])) {
        // Read the file contents
        $fileContents = file_get_contents($fitcher["tmp_name"]);

        if ($fileContents === false) {
            echo "Error reading the file.";
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
                        echo "Error: Password is null in row $i. Handling this case differently...\n";
                        // Add your logic here
                        continue;  // Skip the rest of the loop for this row
                    }
                } else {
                    echo "Error: Invalid CSV row. Insufficient data.\n";
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
                        echo "Role is empty, assuming existing student '$username' aditional group.\n";
                        $voidRole = true;
                    } elseif ($role !== 'student') {
                        if ($role == 'role') {
                            continue;  // Skip the rest of the loop for this row
                        }
                        echo "Error on row $i: Invalid role '$role'. Only 'student' role is accepted.\n";
                        continue;  // Skip the rest of the loop for this row
                    }

                    // Perform simple validations
                    if (!$isUsernameUnique && $voidRole == false) {
                        echo "Error on row $i: Username '$username' already exists.\n";
                        continue;  // Skip the rest of the loop for this row
                    }

                    if (!$isEmailUnique && $voidRole == false) {
                        echo "Error on row $i: Email '$email' already exists.\n";
                        continue;  // Skip the rest of the loop for this row
                    }

                    
                } else {
                    echo "Error on row $i: Invalid CSV row. Insufficient data.\n";
                    continue;  // Skip the rest of the loop for this row
                }

                if ($voidRole) {
                    $voidRole = $users->voidRole($rowData);
                    if ($voidRole) {
                        echo "User '$username' on row $i added successfully to class '$row[6]'.\n";
                    } else {
                        echo "Error on row $i: User '$username' could not be added  to class '$row[6]' .\n";
                        continue;
                    }
                } else {
                    $dataResult = $users->uploadCSVUserData($rowData);
                    if ($dataResult) {
                        echo "User '$username' on row $i added successfully.\n";
                    } else {
                        echo "Error on row $i: User '$username' could not be added.\n";
                        continue;
                    }
                    echo "<br>";
                }
                $voidRole = false;
            }

            echo "</pre>";
        }
    } else {
        echo "The file does not exist.";
    }

    $response->setTemplate("CSVpanel.php");
    return $response;
}
