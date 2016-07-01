<?php 

class M_Articles{

    private static $instance;

    public static function getInstance()
    {
        if(self::$instance == null)
            self::$instance = new M_Articles();

        return self::$instance;
    }

    public function allArticles()
    {

        $db=M_Mysql::getInstance();
        $rows=$db->Select("SELECT * FROM articles ORDER BY id DESC");
        return $rows;
    }
    
    public function getArticles($id)
    {
        $db=M_Mysql::getInstance();
        $query="SELECT * FROM articles WHERE id='%d'";
        $id=$db->mres($id);
        $string=sprintf($query,$id);
        $rows=$db->Select($string);
        return $rows[0];
    }
    
    public function addArticles($title, $created_at, $content,$whoAdd)
    {

        $db=M_Mysql::getInstance();
        $db->Insert("articles",['title'=>$title,'created_at'=>$created_at,'content'=>$content,'whoAdd'=>$whoAdd]);
        return $db;
    }
  
    public function editArticles($id, $title, $created_at, $content)
    {

        $db=M_Mysql::getInstance();
        $db->Update('articles',['title'=>$title,'created_at'=>$created_at,'content'=>$content],"id=$id");
        return $db;
    
    }
    
    public function deleteArticles($id)
    {
        $db=M_Mysql::getInstance();
        $db->Delete("articles","id='$id'");
        return $db;
    }
    
    public function previewArticles($article_text,$len)
    {
    
        return mb_substr($article_text, 0, $len);
    
    }
    public function verifyViewsArticle($id)
    {

        $ip_visitor=$_SERVER['REMOTE_ADDR'];
        $db=M_Mysql::getInstance();
        $id=$db->mres($id);
        $verify_query="SELECT id_ip FROM visits WHERE  ip_address='$ip_visitor' AND id_article='%d'";
        $verify_string=sprintf($verify_query,$id);
        $rows=$db->Select($verify_string);
        
        if(count($rows)==0)
         {
            $db->Insert('visits',['ip_address'=>$ip_visitor,'id_article'=>$id]);
            return true;
         }
         else
         {
            return false;
         }

    }
    public function showViewsArticle($id)
    {
         $db=M_Mysql::getInstance();
         $query="SELECT id_ip FROM visits WHERE id_article='%d'";
         $id=$db->mres($id);
         $string=sprintf( $query,$id);
         $views=$db->Select($string);
         return $views;
    }
    public function sortArticles($sortdate)
    {
        $db=M_Mysql::getInstance();
        $query="SELECT * FROM articles WHERE created_at>='$sortdate' ORDER BY id DESC";
        $rows=$db->Select($query);
        return $rows;

    }
}

?>