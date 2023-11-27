<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>

<?php require_once("nav.php") ?>

<body>
    <form id="userForm" method="POST" action="changeUser">
        <table id="userDataTable">
            <thead>
                <tr>
                    <th>Nom d'usuari</th>
                    <th>Nom</th>
                    <th>Cognoms</th>
                    <th>E-Mail</th>
                    <th>Classe</th>
                    <th>Acció</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $user) : ?>
                    <tr>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['grup_name'] ?></td>
                        <td>
                            <select class="action-select" name="selectedData[]">
                                <option value=""></option>
                                <option value="Accept">Acceptar</option>
                                <option value="Deny">Denegar</option>
                            </select>
                            <input type="hidden" name="userID[]" value="<?= $user['user_ID'] ?>" />
                            <input type="hidden" name="grupID[]" value="<?= $user['grup_ID'] ?>" />
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input type="submit" value="save">
    </form>

    <script>
        // Initialize DataTable
        $(document).ready(function () {
            $('#userDataTable').DataTable();
        });
    </script>
</body>

</html>
