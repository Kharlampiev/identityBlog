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
        $rows=$db->Select("SELECT * FROM articles WHERE id=$id");
        return $rows[0];
    }
    
    public function addArticles($title, $date, $content,$whoAdd)
    {

        $db=M_Mysql::getInstance();
        $db->Insert("articles",['title'=>$title,'date'=>$date,'content'=>$content,'whoAdd'=>$whoAdd]);
        return $db;
    }
  
    public function editArticles($id, $title, $date, $content)
    {

        $db=M_Mysql::getInstance();
        $db->Update('articles',['title'=>$title,'date'=>$date,'content'=>$content],"id=$id");
        return $db;
    
    }
    
    public function deleteArticles($id)
    {
        $db=M_Mysql::getInstance();
        $db->Delete("articles","id=$id");
        return $db;
    }
    
    public function previewArticles($article_text,$len)
    {
    
        return mb_substr($article_text, 0, $len);
    
    }
    public function viewsArticle($id)
    {

        $ip_visitor=$_SERVER['REMOTE_ADDR'];
        $db=M_Mysql::getInstance();
        $rows=$db->Select("SELECT id_ip FROM visits WHERE  ip_address='$ip_visitor' AND id_article='$id'");
         
         if(count($rows)==0)
         {
            $db->Insert('visits',['ip_address'=>$ip_visitor,'id_article'=>$id]);
         }
        /* else
         {
            $views=$db->Select("SELECT views FROM visits WHERE ip_address='$ip_visitor' AND id_article='$id'");
            
            $view=$views[0]['views'];
           
           // var_dump($view);
                $db->Update('visits',['views'=>++$view],"id_article='$id'");
            
            
         
         }*/
         $result=$db->Select("SELECT id_ip FROM visits WHERE id_article='$id'");

        return $result;
    }
    public function showViewsArticle($id)
    {
         $db=M_Mysql::getInstance();
         $views=$db->Select("SELECT id_ip FROM visits WHERE id_article='$id'");
         return $views;
    }
}

?>