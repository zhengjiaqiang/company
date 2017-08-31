<?php 
namespace backend\models;
use yii\db\ActiveRecord;
class Admin extends ActiveRecord
{
	public  static function tableName()
	{
		return 'admin';
	}
	public function rules()
    {
        return [
            [['uname','upwd'],'required'],
        ];
    }
    public function attributeLabels()
    {
    	return [
         'uname'=>'用户名',
         'upwd'=>'密码'
    	];
    }
}


 ?>