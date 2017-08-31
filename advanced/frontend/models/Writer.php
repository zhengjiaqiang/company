<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class Writer extends ActiveRecord
{
	public  static function tableName()
	{
		return 'writer';
	}
	public function rules()
    {
        return [
            [['writer_name','age','pwd','identity','email','novel'],'required'],
        ];
    }
    // public function attributeLabels()
    // {
    // 	return [
    // 	'writer_name'=>'用户名',
    // 	 'age'=>'密码',
    // 	 'pwd'=>'是否申请作者'
    // 	];
    // }
}


 ?>