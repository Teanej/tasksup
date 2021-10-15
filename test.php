<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        color: white;
        background-size: contain;
        transition: 0.3s;
        background: black;
        text-align: center;
      }

      * {
        box-sizing: border-box;
        font-family: "Raleway";
        outline: none;
        margin: 0;
        padding: 0;
      }

      div,form {
        text-align: center;
        transition: 0.3s;
        background: silver;
        color: black;
        padding: 50px 50px 50px 50px;
        width: 700px;
        margin: auto;
      }

      div,form:hover {
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
  </style>
  <br>
  <br>
  <br>
<h2>

  Welcome TO TasksUp TEST!

</h2>
<br>
<br>
<p>If you pass this test you will be taken to the TasksUp dashboard!</p>
<br>
<br>
<p>You need to guess the number that computer is thinking of in 5 tries. If you guess it you are going to the TasksUp dashboard, but if you don't you are going to stay here until succeed :| .</p>
<br>
<br>

<br>
<br>
<button id="submit">Start</button>
<br>
<br>
<div id="congrats" style="display: none;">
  <h2>Congrats, You got into a TasksUp Dashboard</h2>
  <br>
  <br>
  <form action="room_chat.php" method="POST">
    <h2>Your TasksUp room chat account information</h2>
    <br>
    <br>
    Username: <input type="text" name="room_chat_username" value='<?php echo $_POST["user_user_username"];?>'>
    <br>
    <br>
    Password: <input type="password" name="room_chat_password" value='<?php echo $_POST["user_user_username2"];?>'>
    <br>
    <br>
    Phone Number: <input type="number" name="room_chat_number" value='<?php echo $_POST["user_user_number"];?>'>
    <button type="submit">Go</button>
  </form> 
  <form action="blog_chat.php" method="POST">
    <h2>Your TasksUp blog_chat account information</h2>
    <br>
    <br>
    Username: <input type="text" name="blog_chat_username" value='<?php echo $_POST["user_user_username"];?>'>
    <br>
    <br>
    Password: <input type="password" name="blog_chat_password" value='<?php echo $_POST["user_user_username2"];?>'>
    <br>
    <br>
    Phone Number: <input type="number" name="blog_chat_number" value='<?php echo $_POST["user_user_number"];?>'>
    <button type="submit">Go</button>
  </form>
  <form action="game_chat.php" method="POST">
    <h2>Your TasksUp game_chat account information</h2>
    <br>
    <br>
    Username: <input type="text" name="game_chat_username" value='<?php echo $_POST["user_user_username"];?>'>
    <br>
    <br>
    Password: <input type="password" name="game_chat_password" value='<?php echo $_POST["user_user_username2"];?>'>
    <br>
    <br>
    Phone Number: <input type="number" name="game_chat_number" value='<?php echo $_POST["user_user_number"];?>'>
    <button type="submit">Go</button>
  </form>
</div>
<script>
document.getElementById("submit").addEventListener("click" , function() {

  let maximum = 100;
  while(!maximum) {
    maximum = parseInt (prompt('Please enter a valid number') )
  }
  const targetNum = Math.floor(Math.random()*maximum)+1;
  let attempts =0;
  let maxAttempts = 7;
  
  // ==== Uncomment the line below to cheat --> ======
  
  // console.log(targetNum)
  
  let guess = parseInt(prompt(`Enter your first guess!, you have ${maxAttempts} attempts (press 'q' to quit)`));
  while(parseInt(guess) !==targetNum && attempts < maxAttempts-1)  {
    
    if (typeof(guess) === 'string' && guess.toLowerCase() ==='q') {break;}
    attempts++;
    if(guess>targetNum) {
      guess = (prompt(`Too High! Enter new guess! attempts left: ${maxAttempts- attempts}, if you wanna quit hit q`))
    }else {
      guess= (prompt(`Too low! Enter a new Guess! attempts left: ${maxAttempts- attempts}}, if you wanna quit hit q`))
    }
  } 
  if(typeof(guess) === 'string' && guess.toLowerCase() ==='q') {
    alert(`You gave up after ${attempts} attempts`); 
  }
  else if(attempts >= maxAttempts-1) {alert(`Oops, your ${maxAttempts} attempts ran out, the number was ${targetNum}`); document.getElementById("congrats").style.display = "none"}
  else {
    alert(`Good job, you got it ${attempts+1} attempts!, the number was ${targetNum}`); document.getElementById("congrats").style.display = "inline-block";document.getElementById("submit").style.display = "none";
  }
  
})  
  
</script>
</body>
</html>