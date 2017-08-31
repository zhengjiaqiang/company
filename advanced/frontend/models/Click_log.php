<?php 
namespace frontend\models;
use yii\db\ActiveRecord;
class Click_log extends ActiveRecord
{
	public  static function tableName()
	{
		return 'click_log';
	}
	// public function rules()
 //    {
 //        return [
 //            [['uname','upwd'],'required'],
 //        ];
 //    }
}