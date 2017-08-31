<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class Novel extends ActiveRecord
{
	public static  function tableName()
	{
		return 'novel';
	}
	public function getnovel_type()
	{
      return $this->hasOne(Novel_type::className(),['novel_id'=>'novel_id']);
	}
	public function attributeLabels()
	{
		return [
        'novel_name'=>'名字',
        'author'=>'作者',
        'desc'=>'简介',
        'novel_id'=>'所属分类',
         'is_check'=>'是/否审核'
		];
	}
}

 ?>