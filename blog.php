<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TasksUp</title>
	<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
	  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
  />
  <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
</head>
<body>
<form method="GET" style="margin: auto;">
	
    <textarea cols="80" id="blog-content" name="blog-content" rows="10" >    </textarea>

    <script>
        CKEDITOR.replace( 'blog-content', {
            height: 260,
            width: 700,
        } );
    </script>
	<button type="submit" id="submit">Submit</button>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div id="page" style="padding: 10px;
    max-width: 100%;
    line-height: 1.5;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 1px #999;
    width: 700px;
    margin: auto;
    font-family: Raleway;">
		<?php 
echo $_GET['blog-content']
?>
	</div>
</form>

<a href="blog_chat.php">Go back and send your work</a>
</body>
</html>