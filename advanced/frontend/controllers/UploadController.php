<?php 
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Upload;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii;
class UploadController extends Controller
{  
	//多文件上传
	public function actionUpload()
    {
      $model = new Upload(); 
     if (Yii::$app->request->isPost)
      {
        $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles'); 
        $obj=$model->upload();
        $filename=$obj->name;
        $sql="insert into file values(null,'$filename')";
        $res=Yii::$app->db->createCommand($sql)->execute();
        if($res)
        {
        	return $this->render('show');
        }
      } 
   return $this->render('upload', ['model' => $model]); 
   }
   //列表展示
   public function actionShow()
   {
   	 $model = new Upload(); 
   	$sql="select * from file ";
   	$list=Yii::$app->db->createCommand($sql)->queryAll();
   	$arr=array();
   	foreach ($list as $key => $value)
   	{
   		$arr[$value['id']]=$value['file'];
   	   
   	}
     return $this->render('show',['model'=>$model,'arr'=>$arr]);
   }
   public function actionTest()
    {
     // $ids=Yii::$app->request->get('id');
     // die;
    $hostdir= iconv("utf-8","gbk","D:\\web\\yii2.0\\advanced\\frontend\\web\uploads\\") ; //iconv()转换编码方式，将UTF-8转换为gbk，若是报错在gbk后加//IGNORE 
    $filesnames = scandir($hostdir); //scandir() 函数返回指定目录中的文件和目录的数组。默认升序排列，
    //var_dump($filesnames);die; 
    foreach ($filesnames as $name) {
             if($name!=".." && $name!=".") //遍历结果中会多出‘.’以及‘..’，没有用处，不予处理;             
              {
                 $cipath = $hostdir.$name;
                 //$cipath = $hostdir;
                 $cjfilenames = scandir($cipath); //根据情况再决定是否再向下遍历一次
                  foreach($cjfilenames as $cjname)
                 {
                 	
                       if($cjname!=".." && $cjname!="." &&!is_dir($cipath."/".$cjname))
                         {
                             $str = file_get_contents($cipath."/".$cjname);
                             file_put_contents("e:/test.txt",$str,FILE_APPEND);
                         }
                 }
             }
         echo "\n";
    }
    }
  
} 

 ?>