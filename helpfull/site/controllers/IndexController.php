<?php 

//контроллер который создаёт модели и при помощи них вызывает функции
class IndexController extends Controller{

    private $pageTpl='/views/main.tpl.php';

    public function __construct()
    {
    	$this->model=new IndexModel();
    	$this->view =new View();
    }

    //метод для отображения в заголовке
	public function index(){
	  $this->pageData['title']="ВХОД В ЛИЧНЫЙ КАБИНЕТ";
      
      if(!empty($_POST))
      {
      	if(!$this->login())
      	{
      		$this->pageData['error']="неправильный логин или пароль";
      	}
      }
      $this->view->render($this->pageTpl,$this->pageData);
	}
   
    //метод авторизации
	public function login()
	{
		$this->model->checkUser();
	}

}