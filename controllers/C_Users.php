<?php

class C_Users extends C_Base
{
	private $login;
	private $password;
	private $email;


	public function actionIndex()
	{ 
		$this->action_title .="Welcome";
		$this->site_content=$this->Template("view/welcome.php");
	}

	public function actionProfile()
	{
		$this->action_title .="User profile";
		
		if($this->IsGet())
		{
				
			$mUsers=M_Users::getInstance();
			$user=$mUsers->get($_GET['id']);
			$this->site_content=$this->Template("view/users/user.php",['user'=>$user,'title'=>$this->action_title]);
		}
	}
	
	//Авторизация пользователя

	public function actionLogin()
	{
		$this->action_title .="Authorization";
		$mUsers=M_Users::getInstance();
		$uid=$mUsers->getUid();
		$errors=array();
		// Если пользователь авторизован,возвращаем его на страницу
		if($uid !==null)
		{
			header("location: index.php");
			exit();
		}
		
		if($this->IsPost())
		{
	
			$data=$mUsers->login($_POST['login'],$_POST['password'],$_POST['remember']);
			
			if($data==true)
			{
				$_SESSION['login']=$_POST['login'];  //user's login recordes in session
				$user=$mUsers->getByLogin($_SESSION['login']);
				header("location: index.php");
				exit();
			}	
			else
			{
				$errors[]="Check out the data you inputed";
			}
			$this->login=$_POST['login'];
			$this->password=$_POST['password'];
			$this->remember=$_POST['remember'];
		}
		
		$this->site_content=$this->Template("view/auth/login.php",['login'=>$this->login,'password'=>$this->password,
			'remember'=>$this->remember, 'action_title'=>$this->title,'errors'=>$errors]);
	}
	
	public function actionLogout()
	{
		$mUsers=M_Users::getInstance();
		$mUsers->logout();
		header('Location:index.php');
	}

	public function actionRegister()
	{
		$this->action_title .="Registration";
		$mUsers=M_Users::getInstance();
		$errors=array();
		if($this->IsPost())
		{
			$user=$mUsers->getByLogin($_POST['login']);
			$data=$mUsers->register($_POST['login'],$_POST['password'],$_POST['password_confirm'],$_POST['email']);
				if($data==true)
				{

					header('location:index.php?c=users&action=login');
					exit();
				} 
				else
				{
					$errors[]="Registration faulted";
					
					if ($_POST['password']!==$_POST['password_confirm'])
						{
							$errors[]="Passwords do not match";
						}
					else if($user==true)
						{
				 			$errors[]="This user already exists";
						}
				}

			$this->login=$_POST['login'];
			$this->password=$_POST['password'];
			$this->password_confirm=$_POST['password_confirm'];
			$this->email=$_POST['email'];
		}
		
		$this->site_content=$this->Template("view/auth/register.php",
			['login'=>$this->login,'password'=>$this->password,'password_confirm'=>$this->password_confirm,
			'email'=>$this->email,'errors'=>$errors,'action_title'=>$this->action_title]);
	}
}
?>