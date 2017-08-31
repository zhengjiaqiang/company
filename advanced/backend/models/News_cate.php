<?php 
namespace backend\models;
use yii\base\Model;
use yii;
class News_cate extends Model
{    
	public function insert($data)
	{ 
		// print_r($data);die;
		$cate_name=$data['cate_name'];
		$sort=$data['sort'];
		$link=$data['link'];
		$is_show=$data['is_show'];
		$post_data=Yii::$app->db
		->createCommand()
		->insert('news_cate',['cate_name'=>$cate_name,'sort'=>$sort,'link'=>$link,'is_show'=>$is_show])
		->execute();
		return $post_data;
	}
}

 ?>