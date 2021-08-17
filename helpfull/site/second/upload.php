<?php
//добавление пользователя и его фотографии
if(isset($_FILES['avatar']))
$file=$_FILES['avatar'];
print("Загружен файл с именем".$file['name']."и размером".$file['size']."байт");

$current_path=$_FILES['avatar']['tmp_name'];
$filename="/images/".$_FILES['avatar']['name'];
$new_path=dirname(__FILE__).'/'.$filename;
move_uploaded_file($current_path,$new_path);


class Pain
{
	public function greatpain()
	{
$id=(trim($_POST['id']));
$photo=(trim($_POST['photo']));


$mysql=new mysqli('site','root','root','user');
$mysql->query("INSERT INTO `photo`(`id`,`photo`)VALUES('$id','$photo')");

$mysql->close();
header('Location:/');
     }
}
$new=new Pain();
$new->greatpain();

?>
