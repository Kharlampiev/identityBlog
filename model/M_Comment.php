<?php 
include_once("model/M_Mysql.php");

	///////////////////////////////////////////////
	//////////////////////////////////////////////
	///////// Клас модели комментраиев //////////
 

 class M_Comment 
 {
 	
 	///////////////////////////////////////////////
 	////////// Получение всех комментариев ///////

 	public static function all_Comments($id){
 		$DB=M_Mysql::GetInstance();
		$rows=$DB->Select("SELECT * FROM comments WHERE id_article=$id  ORDER BY id_comment DESC ");
		return $rows;
 	}

 	/////////////////////////////////////////////
 	/////////// Добавление комментраия /////////

 	public static function add_Comments($id,$name, $text){

 		$name=trim($name);
 		$text=trim($text);

 		if($name=='' && $text='' ) return false;

		$DB=M_Mysql::GetInstance();
    	
    	$DB->Insert("comments",['id_article'=>$id,'name'=>$name,'text'=>$text]);
		return $DB;
	}

	/////////////////////////////////////////////
	///////////// Удаление комментария /////////

	public static function delete_Comments($id_comment){

		$DB=M_Mysql::GetInstance();
        $DB->Delete("comments","id_comment=$id_comment");
        return true;
  
	}
 }



 ?>