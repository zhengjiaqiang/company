<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class Regist extends ActiveRecord
{   
	public $uname;
	public static function tableName()
	{
		return 'regist';
	}
	 public function rules()
    {
        return [
            [['uname', 'upwd'], 'required'],
            [['uname'],'match','pattern'=>'/^[a-zA-Z]\w{3,15}$/i','message'=>'用户名必须是英文,且长度最少大于三个字符,最多不能超过16个字符'],
           // [['uname'],match,'not'=>ture,'pattern'=>'/^[a-zA-Z]\w{3,15}$/ig','message'=>'提示信息'],
        ];
    }
}

 ?>