<?php 
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Regist;
use yii\data\Pagination;
use yii;
class BookController extends Controller
{   
	public $enableCsrfValidation=false;
	
	public function actionIndex()
	{
        $sql="select * from article_type";
    	$list=Yii::$app->db->createCommand($sql)->queryAll();
    	//$list=$this->actionCategory($data);
		return $this->renderPartial('index',['list'=>$list]);
	}
	 /**分类树
     * @$p_id 父级id
     * @$leve 层级关系
     * @return $arr
     */
	 // public function actionCategory($data,$p_id=0,$level=0)
  //   {
  //    static $arr=array();
  //    foreach ($data as $key => $value)
  //    {
  //    	if($value['p_id']==$p_id)
  //    	{
  //    		$value['level']=$level;
  //    		$arr[]=$value;
  //    		$this->actionCategory($data,$value['type_id'],$level+1);
  //    	}
  //    }
  //    return $arr;
  //   }
}

 ?>