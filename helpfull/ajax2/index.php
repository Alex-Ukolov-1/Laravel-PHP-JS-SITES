<?php 
include 'some.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ajax php</title>
	<script
  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function()
  		{
  			var commentCount=2;
  			$("button").click(function()
  				{
  					commentCount=commentCount+2;
  					$("#comments").load("load-dash.php",{
                       commentNewCount:commentCount
  					});
  				});
  		});
  </script>
</head>
<body>
  <div id="comments">
  </div>

  <button>SHOW MORE COMMENTS</button>
</body>
</html>