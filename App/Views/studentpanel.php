<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
</head>
<body>
   <p>Name: <?php echo $result["name"]?></p> 
   <p>Last name: <?php echo $result["last_name"]?></p>
   <p>Email: <?php echo $result["email"]?></p>
   <p>Rol: <?echo $_SESSION["role"]?></p>
</body>
</html>