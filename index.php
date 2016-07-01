<?php 

function classesAutoload($name) 
{
    //Подгружаем классы
    $file = 'controllers/'.$name.'.php';
   
    if(!is_file($file)) 
    {
        $file = 'models/'.$name.'.php';
       
        if (!is_file($file)) return;
    }
    
    include_once($file);
}

spl_autoload_register('classesAutoload');// регистрирует как autoload

$action="action";
$action .=(isset($_GET['action']))? $_GET['action']: 'Index';		

	if(isset($_GET['c']))
	{
		switch ($_GET['c']) 
		{
	
			case 'article':
				$controller=new C_Article();
			break;
			case 'users':
				$controller=new C_Users();
			break;
	
			default:
				$controller=new C_Article();
		}
	} 
	else $controller=new C_Article();
	
	$controller->request($action);
?>
 
