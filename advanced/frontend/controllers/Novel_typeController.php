<?php 
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Novel;
use frontend\models\Novel_type;
use frontend\models\Comment;
use frontend\models\Logins;
use frontend\models\Regist;
use yii\data\Pagination;
use yii;
class Novel_typeController extends Controller
{   
	//public $enableCsrfValidation=false;
	//列表展示
	public function actionTypeshow()
	{
		$data=Novel_type::find();
		$res = $data->asArray()->all();
     $arr=array();
     foreach ($res as $key => $value)
     {
      $arr[$value['novel_id']]=$value['type_name'];
     }
      // print_r($arr);
      // die;
     $model=new Novel_type;
		return $this->render('type_show',['model'=>$model,'arr'=>$arr]);
	}
	public function actionAddtype()
	{
		 if(Yii::$app->request->post('Novel_type'))
       {
         $c=new Novel_type();
         $data=Yii::$app->request->post('Novel_type');
         //print_r($data);die;
         $new_type= implode(' ', $data['type_name']);
         $c->type_name=$new_type;
         //$c->desc=$data['desc'];
         $res=$c->save();
         if($res)
         {
         return $this->redirect('?r=novel_type/typeshow');
         }
      }
      else
       {
         $c=new Novel_type();
         return $this->render('form',['model'=>$c]);
       }

	}
   public function actionSearch()
   {
    
     $keys=Yii::$app->request->post('Novel_type');
      $ids=implode(',', $keys['type_name']);
     $sql="select * from novel_type join novel on novel_type.novel_id=novel.novel_id where novel.novel_id like '%$ids%'";
     $rows=Yii::$app->db->createCommand($sql)->queryAll();
      foreach ($rows as &$val)
      {
        $novel_id=explode(',', $val['novel_id']);
        $str='';
       foreach ($novel_id as $value) 
       {
       $info=Novel_type::find()->where(['novel_id'=>$value])->asArray()->one();
            $str.=','.$info['type_name'];
       }
       $str=ltrim($str,',');
        $val['type_name']=$str;
     }
      return $this->render('search',['rows'=>$rows]);
   }
  
}

 ?>