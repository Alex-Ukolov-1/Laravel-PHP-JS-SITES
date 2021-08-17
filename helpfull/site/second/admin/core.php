<?php
require_once("function.php");

//выбор функции в соответствие от полученного параметра $action
$action = $_POST['action'];


switch ($action) {
    case 'init':
        init();
        break;
    case 'loadGoods';
          loadGoods();
        break;
}