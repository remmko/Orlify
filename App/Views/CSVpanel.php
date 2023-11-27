<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujada CSV</title>
</head>

<body>

    <h2>Puja fichers CSV</h2>

    <form action="upload" method="post" enctype="multipart/form-data">
        <label for="file">Choose a CSV file:</label>
        <input type="file" name="fitcher" id="file" accept=".csv" required>
        <br>
        <input type="submit" value="Upload">
    </form>

</body>

</html>