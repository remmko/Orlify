<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="/main.css">

</head>

<?php require_once("nav.php") ?>

<body>

    <div id="left_menu">
        <li class="list-none">
            <ul onclick="showTable()">Alumnes no asignats</ul>
            <script>
                var groups = <?php echo json_encode($groups); ?>;
                for (var i = 0; i < groups.length; i++) {
                    document.write("<ul onclick = 'showStudents("+i+")'>" + groups[i].grup_name + "</ul>");
                }
            </script>
        </li>
    </div>

    <form id="userForm" method="POST" style="display: none" action="changeUser" class="mx-auto max-w-screen-lg mt-8">
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
                            <select class="action-select" name="selectedData[]" style="border: 1px solid black">
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

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Guardar
        </button>
    </form>



    <form id="grupForm" method="POST" style="display: none" action="changeUser" class="mx-auto max-w-screen-lg mt-8">
        <table id="userTable">
            <thead>
                <tr >
                    <th>Nom d'usuari</th>
                    <th>Nom</th>
                    <th>Cognoms</th>
                    <th>E-Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $users) : ?>
                    <tr>
                        <script>
                            var users = <?php echo json_encode($users); ?>;
                            var groupID = document.getElementById("groupID").textContent;
                            for (var i = 0; i < users.length; i++) {
                                document.write("<td>" + users[groupID].username + "</td>");
                                document.write("<td>" + users[groupID].name + "</td>");
                                document.write("<td>" + users[groupID].last_name + "</td>");
                                document.write("<td>" + users[groupID].email + "</td>");
                            }
                        </script>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Guardar
        </button>
    </form>

    <script src="/js/flowbite.min.js"></script>
    <script src="/js/bundle.js"></script>
    <script src="/js/index.js"></script>

    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <input type="hidden" id="groupID">

    <script>
        // Initialize DataTable
        var table = document.getElementById("userForm");
        var table2 = document.getElementById("grupForm");
        var groupID;

        function showTable() {
            table.style.display = "block";
            table2.style.display = "none";
            $('#userDataTable').DataTable();
        }

        function showStudents(groupID){
            var group = document.getElementById("groupID");
            group.textContent = groupID;
            table2.style.display = "block";
            table.style.display = "none";
            $('#userTable').DataTable();

        }
       
    </script>
</body>

</html>
