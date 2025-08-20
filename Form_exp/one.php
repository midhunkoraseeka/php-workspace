<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="final.php" method="post">
        <h1>details</h1>
        <label for="Name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="Email">Email: </label>
        <input type="email" id="email" name="email" required><br>

        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" required><br>

        <label for="ConfirmPassword">ConfirmPassword:</label>
        <input type="password" id="ConfirmPassword" name="ConfirmPassword" required><br>
        
        <label for="Gender">Gender:</label>
        <input type="radio" name="Gender" id="Gender">Male<br>
        <input type="radio" name="Gender" id="Gender">Female <br>
        <input type="submit" value="submit">
    </form>
</body>
</html>