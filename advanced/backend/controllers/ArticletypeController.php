<?php 
namespace backend\controllers;
use yii\web\Controller;
use yii;
class ArticletypeController extends  Controller
{   
	 public $enableCsrfValidation=false;
   public function actionForm()
    {
      
      return $this->render('form');
    }
     //批量添加
    public function actionType_add()
    {   
       
         header("content-type:textml;charset=utf-8");
        if(!empty($_FILES['file']['name'])) {
            $name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];

            $filename = '../../common/uploads/img/' . date('Y/m/d/');

            if (!is_dir($filename)) {
                mkdir($filename, 0777, true);
            }
            $file = $filename . $name;

            if (move_uploaded_file($tmp_name, $file)) {
                $str = $file;
            }

            $arr = file_get_contents($str);
            if (!strpos($arr, '}')) {
                $row = explode(',', $arr);
                $sql = "insert into `food` values(null,'$row[0]','$row[1]','$row[2]','$row[3]')";
                Yii::$app->db->createCommand($sql)->execute();
               $this->redirect('?r=articletype/form');
            } else {
                $arr = explode('}', $arr);
                print_r($arr);die;
                foreach ($arr as $k => $v) {
                    $row = explode(',', $v);

                    $sql = "insert into `food` values(null,'$row[0]','$row[1]','$row[2]','$row[3]')";
                    Yii::$app->db->createCommand($sql)->execute();
                }
                //$this->redirect('?r=articlest');
            }


        } 

    }
    
	//文章分类
	// public function actionTypelist()
	// {
 //        $sql="select * from article_type";
 //    	$data=Yii::$app->db->createCommand($sql)->queryAll();
 //    	$list=$this->actionCategory($data);
	// 	return $this->renderPartial('type_list',['list'=>$list]);
	// }
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