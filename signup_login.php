<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TasksUp</title>
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
      body {
        background: white;
        background-size: contain;
        overflow-y: hidden;
        overflow-x: hidden;
        transition: 0.3s;
        background: black;
      }
      body:hover {
        background: black;
      }
      * {
        box-sizing: border-box;
        font-family: "Raleway";
        outline: none;
        margin: 0;
        padding: 0;
      }

      form {
        text-align: center;
        transition: 0.3s;
        background: silver;
        color: black;
        padding: 50px 50px 50px 50px;
        width: 700px;
        margin: auto;
      }

      form:hover {
        border-radius: 200px;
        background: black;
        color: white;
      }

      a {
        text-decoration: none;
        color: white;
        background: seagreen;
        border: none;
        border-radius: 25px;
        padding: 10px 10px 10px 10px;
        transition: 0.3s;
      }

      a:hover {
        padding: 5px 5px 5px 5px;
      }

      a:active {
        opacity: 0.5;
      }

      p {
        transition: 0.3s;
      }

      p:hover {
        font-style: italic;
      }

      h2 {
        transition: 0.3s;
      }

      h2:hover {
        width: 500px;
        margin: auto;
        border: 1.5px solid lightgrey;
        border-radius: 25px;
        padding: 10px 10px 10px 10px;
        background: white;
        color: black;
      }

      button {
        text-decoration: none;
        color: white;
        background: royalblue;
        border: none;
        border-radius: 25px;
        padding: 10px 10px 10px 10px;
        transition: 0.3s;
      }

      button:hover {
        padding: 5px 5px 5px 5px;
      }

      button:active {
        opacity: 0.5;
      }
      input,
      textarea {
        padding: 10px 10px 10px 10px;
        border: none;
        border-radius: 25px;
        transition: 0.3s;
        resize: none;
      }
      input:hover {
        opacity: 0.8;
      }
      textarea:hover {
        opacity: 0.8;
      }
      input:focus {
        border: 1.5px solid grey;
      }
      textarea:focus {
        border: 1.5px solid grey;
      }
    </style>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <form method="GET" action="profile.php"  id="form">
      <h2>Login/SignUp <img src="logo.png" width="26" height="26" /></h2>
      <br />
      <p>Username:</p>
      <br />
      <input
        type="text"
        id="user-username"
        name="user-username"
        placeholder="Type your username"
        required
      />
      <br />
      <br />
      <p>Password:</p>
      <br />
      <input
        type="password"
        id="user-password"
        name="user-password"
        placeholder="Type your password"
        required
      />
      <br />
      <br />
      <p>Phone Number:</p>
      <br />
      <input
        type="text"
        id="user-number"
        name="user-number"
        placeholder="Type your phone number"
        required
      />
      <br />
      <br />
      <button type="submit" >Submit</button>
    </form>
    <?php  $username = $_GET["user-username"]; 
  $password = $_GET["user-password"]; 
  $number = $_GET["user-number"]; 
    ?>
  </body>
</html>
