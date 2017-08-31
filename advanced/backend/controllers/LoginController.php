<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Admin;
use backend\models\Regist;

class LoginController extends Controller
{     
           //登录
	public function actionIndex()
	{    
		if(Yii::$app->request->post('Regist'))
		 {
			
		$data=Yii::$app->request->post('Regist');
		$uname=$data['uname'];
		$upwd=$data['upwd'];
		$row=Regist::find()->where(['uname'=>$uname])->asArray()->one();
		 if($row)
		 {
		
		 if($row['uname']==$uname&&$row['upwd']==$upwd)
		 {
		  $session=Yii::$app->session;
             $session->open();//开启session
             $session->set('user',$row['uname']);//设置session
            $session->get('user'); //获取session
		 echo "<script>alert('登录成功,用户名与密码输入正确');</script>";
		  return $this->redirect('?r=article/show');
		 }
		  else
		 {
           echo "<font color='red'>密码输入有误,请重新输入</font>";
		 }

		}
		else
		{
        echo "<script>alert('该用户不存在,请注册');location.href='?r=login/regist';</script>";
		}
	    }
	  else
		{
           $model=new Regist();
	       return $this->render('login',['model'=>$model]);
	      
	    }  
	}
	  //登出
	   public function actionLoginout()
	   {
	   	     $session=Yii::$app->session;
             $session->open();//开启session
             $session->destroy();// 销毁session中所有已注册的数据
            return $this->redirect('?r=login/index');
	   }
        //注册
		 public function actionRegist()
		 {  
		 if(Yii::$app->request->post('Regist'))
		 {
			$data=Yii::$app->request->post('Regist');
			$r=new Regist();
			$r->uname=$data['uname'];
			$r->upwd=$data['upwd'];
			$r->sex=$data['sex'];
			$r->age=$data['age'];
			$r->phone=$data['phone'];
			$r->email=$data['email'];
			$res=$r->save();
			if($res)
			{
				echo "<script>alert('注册成功');location.href='?r=login/index';</script>";
			}
			else
			{
              echo "注册失败";
			}		
		}
		else
		{
			$r=new Regist;
		 	return $this->render('regist',['regist'=>$r]);
		}

		}


       }
             