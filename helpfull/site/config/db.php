<?php  
//класс подключения к бд
class DB
{

    public static function connToDB(){
    $conn=new PDO('mysql:host=site;dbname=user','root','root');
    return $conn;
    }
}

?>