<?php
include("database.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
      <form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">
          <h2>Welcome to Instagram!!!</h2>
          username:<br>
          <input type = "text" name = "username"><br>
          password:<br>
          <input type="password" name = "password"><br>
          <input type="submit" name = "submit" value = "Sign UP">
      </form>
  </body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
      $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

      if(empty($username)){
        echo "Please enter a username.";
      }
      elseif(empty($password)){
        echo "Please enter a password.";
      }
      else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO registration (username, password) VALUES (?,?)";
        if(mysqli_query($conn, $sql)){
            echo "You have successfully signed up!";
        }
        else{
          echo "Error: " . mysqli_error($conn);
        }
      }
    }
    mysqli_close($conn);

?>