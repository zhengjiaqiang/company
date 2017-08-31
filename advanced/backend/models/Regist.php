<?php 
namespace backend\models;
use yii\db\ActiveRecord;
class Regist extends ActiveRecord
{
   
	public  static function tableName()
	{
		return 'regist';
	}
	public function rules()
    {
        return [
            [['uname','upwd','sex','email','phone','age'],'required'],
        ];
    }
    public function attributeLabels()
    {
    	return [
         'uname'=>'用户名',
         'upwd'=>'密码',
         'sex'=>'性别',
         'email'=>'邮箱',
         'phone'=>'手机号',
         'age'=>'年龄'
    	];
    }
}