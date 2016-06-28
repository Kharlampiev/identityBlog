<?php 
session_start();
$mUsers = M_Users::getInstance();
$mUsers->clearSessions();
	
abstract class C_Base extends C_Controller
{
		protected $action_title;
		protected $site_content;
		
		function __construct(){}

		public function before()
		{
			$this->action_title="";
			$this->site_content='';
		}
	

	public function render()
	{
		$page=$this->Template('view/main.php',
			array('action_title'=>$this->action_title,
				'site_content'=>$this->site_content));
		
		echo $page;
	}
	
	public function __call($name,$params)
	{
		$content="<strong> Ошибка 404! <strong></br> Ой!Что-то пошло не так. При обработке вашего запроса произошла ошибка!";
		
		$this->site_content=$this->Template('view/error.php',array('content'=>$content));
    }
}
?>