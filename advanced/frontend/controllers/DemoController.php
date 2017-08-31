<?php 
namespace frontend\controllers;
use yii;
use yii\web\Controller;
use frontend\models\Login;
use frontend\models\Novel;
use frontend\models\Click_log;
use frontend\models\Writer;
use frontend\models\Upload;
use yii\data\Pagination;
use yii\web\UploadedFile;
class  DemoController extends Controller
{     

	         //登录
	public function actionIndex()
	{    
		if(Yii::$app->request->post('Login'))
		 {
			
			$data=Yii::$app->request->post('Login');
			//print_r($data);die;
			$uname=$data['uname'];
			$upwd=$data['upwd'];
			$is_writer=$data['is_writer'];
			if($is_writer==0)
			{
				echo "<script>alert('请您注册');location.href='?r=demo/writer';</script>";
				die;
			}
			$row=Login::find()->where(['uname'=>$uname])->asArray()->one();
			 if($row)
			 {
			
			 if($row['uname']==$uname&&$row['upwd']==$upwd)
			 {
			 echo "<script>alert('登录成功,用户名与密码输入正确');location.href='?r=demo/add';</script>";	
			 }
			  else
			 {
               echo '密码输入有误,请重新输入';
			 }

			}
			else
			{
            echo "<font color='red'>该用户不存在,请注册</font>";
			}
		  }
		 else
		  {
               $model=new Login();
		       return $this->render('login',['model'=>$model]);
		  }  
		
	}
	      //添加操作
	public function actionAdd()
	{
		if(Yii::$app->request->post('Novel'))
		{
			$data=Yii::$app->request->post('Novel');
			$novel=new Novel();
			$novel->novel_name=$data['novel_name'];
			$novel->author=$data['author'];
			$novel->price=$data['price'];
			$novel->desc=$data['desc'];
			 $model = new Upload();
			 //是否是post提交(文件上传)
        if (Yii::$app->request->isPost) {
            $model->imagefile = UploadedFile::getInstance($model, 'imagefile');
            if ($model->upload()) {
                // 文件上传成功
                return;
            }
        }
			$res=$novel->save();
			if($res)
			{
				return $this->redirect('?r=demo/show');
			}
			else
			{
              echo "添加失败";
			}		
		}
		else
		{
			$novel=new Novel();
			$upload=new Upload;
			return $this->render('add',['novel'=>$novel,'upload'=>$upload]);
		}
	}
        //列表展示
	 public function actionShow()
	 {   

	 	 $data=Novel::find();
	 	//设置展示 条数 
	 	$pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '3']);
	 	$res=$data->offset($pages->offset)->limit($pages->limit)->asArray()->all();
	 	return $this->render('show',['res'=>$res,'pages'=>$pages]);
	 }
	 /**
	  *      点赞思路:根据提交的文章id值，查找click_log表中是否已有该用户ip的点击记录，如果有则告诉用户已“赞过了”，反之，则进行一下操作：
	  *  1、更新点赞表中对应的图片click_num字段值，将数值加1。
         2、将该用户IP信息写入到click_log表中，用以防止用户重复点击。
         3、获取更新后的赞值，即赞该图片的用户总数，并将该总数输出给前端页面。
	  * 
	  */
	 public function actionDing()
	 {
	 	$id=Yii::$app->request->get('id');
	 	$click_num=Yii::$app->request->get('click_num');
	 	$ip=Yii::$app->request->userIp;
	 	$arr=['code'=>0,'msg'=>''];
	 	$info=Click_log::find()->where(['ip'=>$ip,'a_id'=>$id])->asArray()->one();
	 	if($info=='')
	 	{
	 		$n=Novel::findOne($id);
		 	$n->id=$id;
		 	$n->click_num=$click_num+1;
		 	$res=$n->save();
		 	//记录日志
		 	$c=new Click_log;
		 	$c->ip=$ip;
		 	$c->a_id=$id;
		 	$c->save();
		 	$row=Novel::find()->where(['id'=>$id])->asArray()->one();
		 	//$arr=['code'=>0,'love'=>$row['click_num']];
		    echo $row['click_num'];
	 	}
	 	else
	 	{
	 		//$arr=['code'=>1,'msg'=>'您已经点过赞啦'];
		 	echo "<font color='red'>您已经点过赞啦</font>";
	 	}
	 }	
	 //作者注册
	 public function actionWriter()
	 {  
	 	$w=new Writer;
       return $this->render('writer',['model'=>$w]);
	 }
	

}


 ?>