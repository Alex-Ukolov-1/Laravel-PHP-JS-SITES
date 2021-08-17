<?php 
    include("index.php");
    $commentNewCount=$_POST['commentNewCount'];

  	$sql="SELECT * FROM ukol LIMIT  $commentNewCount";
  	$result=mysqli_query($conn,$sql);
  	if(mysqli_num_rows($result)>0)
  	{
  		while ($row=mysqli_fetch_assoc($result))
  		{
          echo "<p>";
          echo $row['title'];
          echo "</p>";
          echo $row['content'];
  		}
  	}

?>