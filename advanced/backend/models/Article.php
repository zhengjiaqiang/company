<?php 
namespace backend\models;
use yii\base\Model;
use yii;
class Article extends Model
{    
	public function insert($data)
	{   
		$path=$data['img'];
		$title=$data['title'];
		$author=$data['author'];
		$keys=$data['keys'];
		$desc=$data['desc'];
		$content=$data['content'];
		$time=time();
		$type_id=$data['article_type'];
		$post_data=Yii::$app->db
		->createCommand()
		->insert('article',['title'=>$title,'author'=>$author,'keys'=>$keys,'desc'=>$desc,'content'=>$content,'img'=>$path,'time'=>$time,'type_id'=>$type_id])
		->execute();
		return $post_data;
	}
	public function articleList()
	{

	 $count="select COUNT(*) from article,article_type where article.type_id=article_type.type_id";
   $page_num=5;//每页显示的条数
   $page=isset($_GET['page'])?$_GET['page']:1;//当前页
    $total_page=ceil($count/$page_num);//总页数
   $limit=($page-1)*$page_num;//偏移量
    //上一页
  $up=$page-1<1?1:$page-1;
  //下一页
  $next=$page+1>$total_page?$total_page:$page+1;
   $sql="select * from article,article_type where article.type_id=article_type.type_id limit $limit,$page_num";
	 return $list=Yii::$app->db->createCommand($sql)->queryAll();

	}
	public function delete($id)
	{
	 $sql="delete from article where id='$id'";
	 return Yii::$app->db->createCommand($sql)->execute();

	}

}

 ?>