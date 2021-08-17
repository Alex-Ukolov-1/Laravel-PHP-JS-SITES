<?php
//require("../../../config/route.php");
//require("../../../models/IndexModel.php");
//как только не пытался передать переменную для loadgoods из авторизации
//при попытке подключить любой файл из каталога он вообще ничего не выводит(какая то внутреняя проблема)
//буду благодарен , если найдёте решение
//такое впервые наблюдаю
//$a=1-первый пользователь 2 картинки. $a=2-второй пользователь 1 картинка. $a=3-третий пользователь 1 картинка.
$a=1;

//подключение
function connect(){
    $conn = mysqli_connect("site", "root", "root", "user");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

//вывод товаров
function init(){
    $conn = connect();
    $sql = "SELECT * FROM photo";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
        while($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

//вывод товаров в соответствие с id пользователя
//задача минимум выполненна(картинки выводятся , однако неоходимо $sql 
//сократить до SELECT * FROM photo)
//это будет вывод не по id , но всё же
function loadGoods(){
    global $a;
    $conn=connect();
    //$sql ="SELECT * FROM photo where id=3";
    $sql='SELECT * from photo inner join users on photo.photo = users.id where photo.id="'.$a.'"';
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $out=array();
        while($row = mysqli_fetch_assoc($result))
        {
            $out[$row["id"]]=$row;
        }
        echo json_encode($out);
    }
    else 
    {
        echo "0";
    }
    mysqli_close($conn);
}