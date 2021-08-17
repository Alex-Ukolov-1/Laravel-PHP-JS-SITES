<?php 
//вызов через  конструктор db статистического метода подключения
class Model{
	protected $db=null;

	public function __construct()
	{
		$this->db=DB::connToDB();
	}
}