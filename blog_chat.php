<!DOCTYPE HTML >
<html>
<head>

<!-- Version 1.1 Build 4 -->

  <title>TasksUp</title>
  

  
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="javascript.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
  />
  <link rel="shortcut icon" href="logo.png" type="image/x-icon" />


</head>
<body>

<div id="wrapper">


<div id="chat"><noscript><p>You have to enable Javascript to use this chat.</p></noscript></div> 


<form class="form" id="new" action="save.php" method="POST">

  <input class="name" id="new_name" name="name" placeholder="      Name" autocomplete="on">
  <br>
  <br>
  <div onclick="
  if (!document.getElementById('new_name').value) {
    alert('Please fill in information')
  }
  else {  
  document.getElementById('new_name').disabled = 'true'; document.getElementById('new_message').style.display = 'inline-block'
}">Submit<div>


<br><br>
  <input class="message" id="new_message" name="message" placeholder="Message" onKeyPress="return checkSubmit(event)" autocomplete="off" style="display: none"> 
  <br>
  <p>Press enter to send the message</p>

</form> <!-- #new -->


<a href="blog.php?blog-content">Go to blog editor</a>
<br>
<br>
<a href="room_chat.php">Go to room chat!!!!</a>
<br>
<br>
    <a href="game_chat.php">Go to game chat!!!!</a>
    <br>

<style>
  body {
    background: rgb(246,248,250) url(background.png);
    font-size: 15px;
    line-height: 20px;
    font-family: Raleway;
    color: rgb(85,85,95);
    text-shadow: 0 1px #fff;
    }

* {
    padding: 0;
    margin: 0;
    text-decoration: none;
    border: none;
    }
    
a {
    text-decoration: underline;
    color: rgb(85,85,95);
    }
    
#wrapper {
    width: 500px;
    margin: 0 auto;
    }
    

/* Chat */
    
#chat {
    float: left;
    width: 500px;
    padding: 50px 0 35px 0;
    }
    
#chat .entry {
    float: left;
    padding-bottom: 15px;
    width: 500px;
    }
    
#chat .name {
    float: left;
    width: 110px;
    text-align: right;
    }
    
#chat .content {
    float: left;
    width: 370px;
    padding-left: 20px;
    text-align: left;
    }
    
#chat .message {
    display: inline;
    }
    
#chat .message b {
    font-weight: bold;
    }
    
#chat .time {
    color: rgb(160,160,160);
    opacity: 0.0;
    display: inline;
    }
    
#chat .entry:hover .time {
    opacity: 1.0;
    }
    
    
/* New */
    
#new {
    float: left;
    width: 500px;
    padding: 50px 0 50px 0;
    border-top: 1px solid rgb(196,198,200);
    box-shadow: inset 0 1px #fff, 0 -1px #fff;
    }
    
    /* Name & Content */
    
#new input {
    float: left;
    font-family: "Raleway";
    overflow: hidden;
    font-size: 15px;
    line-height: 15px;
    height: 15px;
    padding: 5px;
    color: rgb(85,85,95);
    -webkit-appearance: none; /* remove iOS inner shadow */
    resize: none;

    border: 1px solid rgb(196,198,200);
    box-shadow: 0 0 0 1px #fff, inset 0 0 0 1px rgb(230,230,230);
    text-shadow: 0 1px #fff;
    transition-property: box-shadow, border, background;
    transition-duration: 0.1s;
    transition-timing-function: linear;
    -webkit-transition-property: box-shadow, border, background;
    -webkit-transition-duration: 0.1s;
    -webkit-transition-timing-function: linear;
    -moz-transition-property: box-shadow, border, background;
    -moz-transition-duration: 0.1s;
    -moz-transition-timing-function: linear;
    -o-transition-property: box-shadow, border, background;
    -o-transition-duration: 0.1s;
    -o-transition-timing-function: linear;
    }
    
#new input:focus {
    outline: none; /* remove Safari blue glow */
    background: none;
    border: 1px solid transparent;
    box-shadow: none;
    }
    
#new input::input-placeholder, #new input::-webkit-input-placeholder, #new input::-moz-input-placeholder, #new input::-o-input-placeholder {
    color: rgb(140,140,140);
    }
    
    /* Name */
    
#new .name {
    width: 92px;
    text-align: right;
    padding: 5px 5px 5px 8px; 
    border-radius: 5px 0 0 5px;
    }
    
    /* Content */
    
#new .message {
    width: 360px;
    margin-left: 20px;
    border-radius: 0 5px 5px 0;
    }
</style>

</div> <!-- #wrapper -->


</body>