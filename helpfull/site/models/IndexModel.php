<?php 
//проверка пользователя и сама авторизация
//метод авторизации/проверки пользователя в бд(модели)
class IndexModel extends Model{
	public function checkUser(){
		session_start();
		$login=$_POST['login'];
		$password=$_POST['pass'];
        

		$sql="SELECT * FROM users WHERE login =:login AND pass=:pass";
		$stmt=$this->db->prepare($sql);
		$stmt->bindValue(":login",$login,PDO::PARAM_STR);
		$stmt->bindValue(":pass",$password,PDO::PARAM_STR);
		$stmt->execute();

		$res=$stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($res))
		{
			header("Location:second/index.html");
		}
		else
		{
			return false;
		}
	}
}