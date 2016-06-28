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
    
    public function addArticles($title, $date, $content)
    {

        $db=M_Mysql::getInstance();
        $db->Insert("articles",['title'=>$title,'date'=>$date,'content'=>$content]);
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
}

?>