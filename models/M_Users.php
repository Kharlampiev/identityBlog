<?php 
class M_Users 
{
		private static $instance;//экземляр класса
		private $msql;
		private $sid; // текущая сессия(идентификатор)
		private $uid; // пользовательская сессия(идентификатор)

	public static function getInstance()
	{
			
			if (self::$instance == null) self::$instance = new M_Users();
			
		return self::$instance;
	}

	//Конструктор 
	public function __construct(){
		
		$this->msql = M_Mysql::getInstance();
		$this->sid = null;
		$this->uid = null;
	}

	//Очистка не используемой сесcии(20 мин вышло)

	public function clearSessions()
	{

		$min= date('Y-m-d H:i:s', time() - 60 * 20);
		$t="time_last < '%s'";
		$where=sprintf($t,$min);
		$this->msql->Delete('sessions',$where);
	}
	// Получаем пользователя по логину
	
	public function getByLogin($login)
	{	
		$query="SELECT * FROM users WHERE login='%s'";
		$login=$this->msql->mres($login);
		$result=sprintf($query,$login);
		$rows = $this->msql->Select($result);
		return $rows[0];
	}

	// Получаем пользователя

	public function get($id_user=null)
	{

	 	if ($id_user == null) $id_user = $this->getUid();

	 	if ($id_user == null) return null;

	 	$db=M_Mysql::getInstance();
	  	$query = "SELECT * FROM users WHERE id_user ='%d'";
		$id_user=$this->msql->mres($id_user);
		$result = sprintf($query, $id_user);
		$rows = $this->msql->Select($result);
		return $rows[0];		

	}
	
	// Получаем id текущей сессии

	public function getSid(){

		if($this->sid !=null) return $this->sid;

		$sid=$_SESSION['sid'];
	// Ищем SID, проверяем наличие ссесии и обновляем time_last  в базе.
		
		if($sid!=null)
		{

			$session=array();
			$session['time_last']=date('Y-m-d H:i:s');
			$where="sid= '$sid'";
			$affected_rows=$this->msql->Update('sessions', $session, $where);

			if($affected_rows==0)
			{
				$query="SELECT count(*) FROM sessions WHERE sid = '$sid'";
				$result=$this->msql->Select($query);
				if ($result[0]['count(*)']==0) $sid=null;			
			}

		}

	// Если сессии нет не ищем логин и пароль в куках
		if($sid==null && isset($_COOKIE['login']))
		{

			$user=$this->getByLogin($_COOKIE['login']);

					if($user !=null && $user['password']==$_COOKIE['password'])
						$sid=$this->openSession($user['id_user']);
		}

		if($sid !=null) $this->sid=$sid;////// Заносим в кеш

		return $sid; ///// возврат SID


	}

	// Получаем id текущего пользователя 
	
	public function getUid(){

		if($this->uid !=null) return $this->uid;

		$sid=$this->getSid();

		if($sid==null) return null;

		$query="SELECT id_user FROM sessions WHERE sid = '$sid'";
		$result = $this->msql->Select($query);

		if(count($result)==0) return null;  //////////сессия не найдена-пользователь не был авторизован

		$this->uid=$result[0]['id_user'];///////// сессия найдена мы ее запоминаем
		return $this->uid;
	}

	//Открытие новой сессии-возвращает SID 

	private function openSession($id){

		$sid=$this->generateString(10);//////генерация SID
		//////////// Вставляем SID в БД  ////////////////
		$now=date('Y-m-d H:i:s'); 
		$session=array();
		$session['id_user']=$id;
		$session['sid'] = $sid;
		$session['time_start'] = $now;
		$session['time_last'] = $now;				
		$this->msql->Insert('sessions', $session); 

		///////////// Регистрация суссии/////////////

		$_SESSION['sid']=$sid;
		return $sid;
	}
  //////////////////////////////////////////////////////////////////
  ///////// Генерируем случайную последовательность///////////////

 private function generateString($length=10)
	{
			$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
			$code="";
			$clen=strlen($chars)-1;

			while(strlen($code)<$length)
					$code.=$chars[mt_rand(0,$clen)];
			
			return $code;

	}


	///////////// Функция авторизации пользователя //////////////(8))

	public function login($login,$password, $remember=true)
	{

		$user=$this->getByLogin($login);
		$id=$user['id_user'];
		if($user==null) return false;
		if($user['login']!=$login) return false;
		if($user['password']!=md5($password)) return false;

		if($remember)
		{
			$expire=time()+3600*24*10;
			setcookie('username', $username, $expire);
			setcookie('password', md5($password), $expire);
		}
		$this->sid=$this->openSession($user['id_user']);
		
		return true;

	}
	
/////////////Функция регистрации пользователя///////////////(8)

	public function register($login,$password,$password_confirm,$email)
	{
		$login=trim($login);
		$password=trim($password);
		$password_confirm=trim($password_confirm);
		$email=trim($email);
		$check_user=$this->getByLogin($login);
		if($password!==$password_confirm) return false;
		if($check_user==true) return false;
		/*$option=['cost'=>10];
		$password=password_hash($password,PASSWORD_BCRYPT,$option);*/
		$table="users";
		$object=['login'=>$login,'password'=>md5($password),'email'=>$email];
		$this->msql->Insert($table,$object);

		return true;

	}

	public function isOnline($id_user){
		$db=M_Mysql::getInstance();
		$query="SELECT * FROM sessions WHERE id_user='%d'";
		$id_user=$db->mres($id_user);
		$string=sprintf($query,$id_user);
		$rows=$this->mysql->Select($string);
		return(count($rows)>0);
	}
	// Функция выхода пользователя 

 	public function logout()
 	{
 		setcookie('login', '', time()-1);
		setcookie('password', '', time()-1);
		unset($_COOKIE['login']);
		unset($_COOKIE['password']);
		unset($_SESSION['login']);
		unset($_SESSION['sid']);		
		$this->sid=null;
		$this->uid=null;

 	}
 	public function can($priv, $id_user = null)
	{		
		if ($id_user == null)
            $id_user = $this->getUid();
        if ($id_user == null)
            return false;
        // Возвращаем кол-во выбранных записей по id_user.
        $query = "SELECT * FROM privs2roles LEFT JOIN users ON privs2roles.id_role = users.id_role LEFT JOIN privs ON privs2roles.id_priv = privs.id_priv WHERE users.id_user = '%d' AND privs.name = '%s'";
        $db=M_Mysql::getInstance();
        $id_user=$db->mres($id_user);
        $priv=$db->mres($priv);
        $string=sprintf($query,$id_user,$priv);
        $rows = $this->msql->Select($string);
        return (count($rows) > 0);
	}
}
?>