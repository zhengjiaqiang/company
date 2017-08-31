<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class Login extends ActiveRecord
{
	public  static function tableName()
	{
		return 'login';
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
    	 'upwd'=>'密码',
    	 'is_writer'=>'是否申请作者'
    	];
    }
}


 ?>