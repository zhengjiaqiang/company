<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class Comment extends ActiveRecord
{
	public static  function tableName()
	{
		return 'comment';
	}
	public function attributeLabels()
	{
		return ['content'=>'评论的内容'];
	}
}

 ?>