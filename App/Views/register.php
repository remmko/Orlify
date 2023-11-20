<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style/registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Registration</title>
</head>

<body>


    <?php include "mainmenu.php";
    
    if($email){
        include "wrongEmail.php";
    }elseif($username){
        include "wrongUsername.php";
    }
    
    ?>
    
    <form action = "checkregister" method = "POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="" class="form-control" name="login" id="inputEmail4" requered="1" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="" class="form-control" name="name" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Surename</label>
                <input type="" class="form-control" name="surename" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name = "email" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Select image</label>
                <input class="form-control" name="img" type="file" id="formFile">
            </div>
        </div>
        <button type="submit" id = "submit" name="submit" class="btn btn-primary">Sign up</button>
        <small id="emailHelp" class="form-text text-muted"><a href="login">Already have an account? Log in!</a></small>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>