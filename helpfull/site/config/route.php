<?php 
//класс который
class Routing{

	public static function buildRoute(){
		//контроллер и action по умолчанию
		$controllerName="IndexController";
		$modelName="IndexModel";
		$action="index";

		$route=explode("/",$_SERVER['REQUEST_URI']);
		//определяя контроллер
		if($route[1]!='')
		{
			$controllerName=ucfirst($route[1]."Controller");
			$modelName=ucfirst($route[1]."Model");
		}
        //indexcontroller.php
		    //indexmodel.php

        include CONTROLLER_PATH . $controllerName . ".php";
        include MODEL_PATH . $modelName . ".php";

        if(isset($route[2])&& $route[2]!='')
        {
          $action=$route[2];
        }

        $controller= new $controllerName();
        $controller->$action();
	}
}
?>