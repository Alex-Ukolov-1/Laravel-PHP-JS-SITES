<?php 
$data=
[
	"title" => $_POST['title'],
	"content" => $_POST['content']
];

$connection=new PDO('mysql:host=USUALPHP;dbname=alex','root','root');
$sql='INSERT INTO ukol(title,content) VALUES (:title,:content)';
$statement=$connection->prepare($sql);
$result=$statement->execute($data);
var_dump($data);
?>