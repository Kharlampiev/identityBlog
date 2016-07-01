<?php 

 class M_Comment 
 {
 	
 	public static function allComments($id){
 		$db=M_Mysql::GetInstance();
 		$query="SELECT * FROM comments WHERE id_article='%d'  ORDER BY id_comment DESC ";
		$id=$db->mres($id);
		$string=sprintf($query,$id);
		$rows=$db->Select($string);
		return $rows;
 	}

 	public static function addComments($id,$name, $text){

 		$name=trim($name);
 		$text=trim($text);
		if($name=='' && $text='' ) return false;
		$db=M_Mysql::GetInstance();
    	$db->Insert("comments",['id_article'=>$id,'name'=>$name,'text'=>$text]);
		return true;
	}

	public static function delete_Comments($id_comment){

		$db=M_Mysql::GetInstance();
        $db->Delete("comments","id_comment='$id_comment'");
        return true;
  
	}
 }



 ?>