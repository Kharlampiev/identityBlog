<?php 

class C_Article extends C_Base
{
	private $title;
	private $created_at;
	private $content;
	private $comments;
		
	public function actionIndex()
	{
		$this->action_title .="Home";
		$mArticles=M_Articles::getInstance();
		$articles=$mArticles->allArticles();
		$this->site_content=$this->Template('view/index.php',['articles'=>$articles,'len'=>255]);
	}

	public function actionGet()
	{
		$this->action_title .="Article";
		
		if($this->IsGet())
		{
			
			$this->id=$_GET['id'];
			$article=M_Articles::getArticles($this->id);
			$viewsArticle=M_Articles::verifyViewsArticle($this->id);
				if(isset($article['id']))
				{
					$comments=M_Comment::all_Comments($this->id);
					$this->comments=$this->Template('view/comment.php',['comments'=>$comments]);
				}
		}
		if ($this->IsPost()) 
		{
				
			$this->id=$_GET['id'];
				if (M_Comment::add_Comments($this->id,$_POST['name'],$_POST['text'])) 
				{
					header("Location:index.php?c=article&action=get&id=$this->id");
					exit();
				}
				else 
				{ 
					echo "Oops.There is some problem.Comments not recieved";
				}
			$this->name=$_POST['name'];
			$this->text=$_POST['text'];

		}
			
		$this->form_comments=$this->Template('view/form_comments.php', ['name'=>$this->name,'text'=>$this->text]);
			
		$this->site_content=$this->Template('view/article.php', ['id'=>$article['id'],'title'=>$article['title'],'created_at'=>$article['created_at'],
			'content'=>$article['content'],'whoAdd'=>$article['whoAdd'],'comments'=>$this->comments,'form_comments'=>$this->form_comments,
			'action_title'=>$this->action_title]);	
	}

	public function actionDelete()
	{
	
		$this->action_title .="Delete";

		if (isset($_GET['id'])) 
		{
			$this->id=$_GET['id'];
			$article=M_Articles::getArticles($this->id);
		
			if($this->IsPost())
			{
				if (isset($_POST['yes']))
				{
					M_Articles::deleteArticles($this->id);
					header("location:index.php");
					exit();
				}
				else 
				{
				 header("Location:index.php?c=article&action=get&id=$this->id");
				 exit();
				}

			}
		}
		$this->site_content=$this->Template('view/delete.php',['id'=> $article['id'],'title'=>$article['title'],'action_title'=>$this->action_title]);
	}

	public function actionAdd()
	{
 	
 		$this->action_title .="Create Article";
		
		if(!empty($this->IsPost()))
		{
			if (M_Articles::addArticles($_POST['title'],$_POST['created_at'],$_POST['content'],$_POST['whoAdd']))
			{
				header('Location: index.php');
				exit();
			}  
		
			$this->title=$_POST['title'];
			$this->created_at=$_POST['date'];
			$this->content=$_POST['content'];
			$this->whoAdd=$_POST['whoAdd'];
		}

 	 	$this->site_content=$this->Template('view/add.php',['action_title'=>$this->action_title]);
	}


	public function actionEdit()
	{
 	
 		$this->action_title .="Edit Article";
		
		if(isset($_GET['id']))
		{

			$this->id=$_GET['id'];
			$article=M_Articles::getArticles($this->id);
	
			if ($this->IsPost())
			{
				if (M_Articles::editArticles($this->id,$_POST['title'], $_POST['created_at'] ,$_POST['content']))
				{
					header("Location: index.php?c=article&action=get&id=$this->id");
					die();
				}
			}

		}

		$this->site_content=$this->Template('view/edit.php', ['id'=>$article['id'],'title'=>$article['title'],'created_at'=>$article['created_at'],
			'content'=>$article['content'],'action_title'=>$this->action_title]);	
 	}
 	public function actionSort()
 	{
 		if($this->IsGet())
 		{
 			$date=$_GET['date'];
 			switch ($date) 
 			{
 				case 'lastmonth':
 					$date= new DateTime(date('Y-m-d',strtotime('-1 months')));
 					break;
 				case 'lastday':
 					$date= new DateTime(date('Y-m-d',strtotime('-1 days')));
 					break;
 				case 'lastweek':
 					$date= new DateTime(date('Y-m-d',strtotime('-1 weeks')));
 					break;
 				default:
 					$date= new DateTime(date('Y-m-d',strtotime('-1 months')));
 					break;
 			}
 			$sortdate=$date->format('Y-m-d');
 			$mArticles=M_Articles::getInstance();
 			$articles=$mArticles->sortArticles($sortdate);
 		}
 		$this->site_content=$this->Template('view/index.php',['articles'=>$articles,'len'=>255]);
 	}
}
?>
