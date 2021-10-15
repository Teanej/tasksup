<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    * {
      font-family: "Raleway";
    }
    body {
  text-align: center;
  background: black;
}

textarea {
  width: 32%;
  float: top;
  min-height: 250px;
  overflow: scroll;
  margin: auto;
  display: inline-block;
  background: black;
  outline: none;
  color: lightgreen;
  font-size: 14px;
  resize: none;
}

iframe {
  bottom: 0;
  position: relative;
  width: 100%;
  height: 35em;
  background: white;
}
  </style>
<textarea id="html" placeholder="HTML"></textarea>
    <textarea id="css" placeholder="CSS"></textarea>
    <textarea id="js" placeholder="JavaScript"></textarea>
    <iframe id="code"></iframe>
<script src="editor.js">
 
</script>    
</body>
</html>