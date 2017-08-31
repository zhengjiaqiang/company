<?php 
namespace backend\models;
use yii\base\Model;
use yii;
class News_add extends Model
{    
	public function insert($data)
	{ 
		$path=$data['img'];
		$title=$data['title'];
		$keys=$data['keys'];
		$desc=$data['desc'];
		$add_man=$data['add_man'];
		$post_data=Yii::$app->db->createCommand()->insert('news_add',['title'=>$title,'keys'=>$keys,'img'=>$path,'desc'=>$desc,'add_man'=>$add_man,'add_time'=>time()])->execute();
		return $post_data;
	}
}

 ?>