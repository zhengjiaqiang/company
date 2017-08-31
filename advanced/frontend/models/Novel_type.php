<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class  Novel_type extends ActiveRecord
{
	public static  function tableName()
	{
		return 'novel_type';
	}
	public function getnovel()
	{
      return $this->hasMany(Novel::className(),['novel_id'=>'novel_id']);
	}
}

 ?>