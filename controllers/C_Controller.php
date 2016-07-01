<?php 

abstract class C_Controller
{
		
	protected abstract function render();
	protected abstract function before();
		
	public function request($action)
	{
		$this->before();
		$this->$action();
		$this->render();
	}

	// функции определения метода передачи данных
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD']=='GET';
	}

	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD']=='POST';
	}
	
		
	protected function Template($file,$var=array())
	{

		foreach ($var as $key => $value) 
		{
	 		$$key=$value;
	 	}
			
		ob_start();
		include $file;
		return ob_get_clean();
	}
}
?>