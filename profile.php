<?php
include_once 'signup_login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TasksUp </title>
  <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
  />
</head>
<body>
<style>
  section {
    display: none;
  }
</style>
  <!-- A form with input field and submit button -->
<form method="GET" id="form2">
<h2>Welcome To TasksUp <img src="logo.png" width="28" height="28"></h2>
<br>
<br>
  Username: <input type="text" name="user-username-output" id="user-username-output" value="<?php echo $username ?>" disabled>
  <br>
  <br>
  Password: <input type="password" name="user-password-output" id="user-password-output" value="<?php echo $password ?>" disabled>
  <br>
  <br>
  Phone Number: <input type="password" name="user-number-output" id="user-number-output" value="<?php echo $number ?>" disabled>
  <br>
  <br>
  <a href="signup_login.php"><-- Change Information</a>
  <br>
  <br>
  <br>
  <br>
  <button onclick="let thisWindow = window.open('quick_lobby_chat.html');thisWindow.user_username_help_me_please = document.getElementById('user-username-output').value;thisWindow.user_password_help_me_please = document.getElementById('user-password-output').value;thisWindow.user_number_help_me_please = document.getElementById('user-number-output').value;">Lobby/Quick Chat --></button>
</form>

<script>
  

  
</script>

<style>
  #form {
    display: none;
  }
  input {
    background: white;
  }
</style>

</body>
</html>