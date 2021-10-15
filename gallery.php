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
        overflow-y: hidden;
        overflow-x: hidden;
        background: black;
        color: white;
        padding-top: 12%;
        text-align: center;
      }
      * {
        box-sizing: border-box;
        font-family: "Raleway";
        outline: none;
        margin: 0;
        padding: 0;
      }

      header {
        text-align: center;
        transition: 0.3s;
        background: whitesmoke;
      }

      header:hover {
        border-radius: 200px;
        background: black;
        color: white;
      }

      section {
        text-align: center;
        transition: 0.3s;
        background: black;
        color: white;
      }

      section:hover {
        border-radius: 200px;
        background: silver;
        color: black;
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
        text-align: center;
      }

      button:hover {
        padding: 5px 5px 5px 5px;
      }

      button:active {
        opacity: 0.5;
      }
      #input,
      #textarea {
        padding: 10px 10px 10px 10px;
        border: none;
        border-radius: 25px;
        transition: 0.3s;
        resize: none;
      }
      #input:hover {
        opacity: 0.8;
      }
      #textarea:hover {
        opacity: 0.8;
      }
      #input:focus {
        border: 1.5px solid grey;
      }
      #textarea:focus {
        border: 1.5px solid grey;
      }
      footer {
        text-align: center;
        transition: 0.3s;
      }
      footer:hover {
        background: black;
        color: white;
      }
  </style>
<input type='file' />
<img id="myImg" src="#" alt="your image" />
<br>
<br>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

  $(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};

</script>
</body>
</html>