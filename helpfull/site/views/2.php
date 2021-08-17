<?php
class Pain
{
	public function greatpain()
	{
$login=(trim($_POST['login']));
$pass=(trim($_POST['pass']));
$email=(trim($_POST['email']));

$mysql=new mysqli('localhost','root','root','user');
$mysql->query("INSERT INTO `users`(`login`,`pass`,`email`)VALUES('$login','$pass','$email')");

$mysql->close();
header('Location:/');
     }
}
$new=new Pain();
$new->greatpain();
?>