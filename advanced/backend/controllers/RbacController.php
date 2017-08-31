<?php 
namespace backend\controllers;
use yii\web\Controller;
use yii;
use db;
use backend\models\Rbac;
class RbacController extends Controller
{
	public function actionIndex()
	{   
		
		return $this->render('index',['msg'=>'您正在使用的是基于角色的访问控制']);
	}
	//创建角色
	public function actionCreaterole()
	{  
		 $model= new Rbac;
		return $this->render('role',['model'=>$model]);
	}
	//角色入库
	public function actionDorole()
	{  
		$data=Yii::$app->request->post('Rbac');
		$item=$data['role'];
		$auth = Yii::$app->authManager; 
		$role = $auth->createRole($item); 
		$role->description = '创建了 ' . $item . ' 角色';
		$res=$auth->add($role);
		return $this->render('index',['msg'=>'角色创建成功啦']);
	}
	   //创建权限
	   public function actionCreatepower()
	 {  
		 $model= new Rbac;
		return $this->render('power',['model'=>$model]);
	}
	//权限入库
	public function actionDopower()
	{ 
		$data=Yii::$app->request->post('Rbac');
		$item=$data['power'];
		$auth = Yii::$app->authManager; 
		$createPost = $auth->createPermission($item);
		$createPost->description = '创建了 ' . $item . ' 许可';
		$auth->add($createPost);
		return $this->render('index',['msg'=>'权限创建成功啦']);
	}
	//给角色分配权限
	public function actionAs_powers()
	{     
		$roles=Rbac::getroles();//查询角色
		$powers=Rbac::getpowers();//查询权限
		 $model= new Rbac;
		return $this->render('rolepower',['model'=>$model,'roles'=>$roles,'powers'=>$powers,'msg'=>'分配权限成功，您可以继续操作']);
		
	}
	//将分配好的角色和权限入库
	public function actionDorolepower()
	{
	 $data=Yii::$app->request->post('Rbac');
	 $role=$data['role'];
	 $power=$data['power'];
	 $item=Rbac::rolepower($role,$power);
	 foreach ($item as  $items)
	  {
        //print_r($items);die;
	  $auth = Yii::$app->authManager;
	  $parent = $auth->createRole($items[0]); 
	  $child = $auth->createPermission($items[1]); 
	  $auth->addChild($parent, $child);		
	  }
	   return $this->render('index',['msg'=>'权限分配成功，您可以继续操作']);
	}
	//给用户分配角色
	public function actionUserole()
	{
	    $roles=Rbac::getroles();//查询角色
		$users=Rbac::getuser();//查询用户
		$model= new Rbac;
		return $this->render('userole',['model'=>$model,'roles'=>$roles,'users'=>$users]);
	}
	 //将分配好的用户与角色入库
	 public function actionDouseroles()
	 { 
	 	$data=Yii::$app->request->post('Rbac');
	 	$role=$data['role'];
	 	$username=$data['username'];
	 	$items=Rbac::useroles($role,$username);
	 	foreach ($items as  $item) 
	 	{
	 	 $auth = Yii::$app->authManager;
        $reader = $auth->createRole($item[0]); 
        $auth->assign($reader, $item[1]);	
	 	}
       return $this->render('index',['msg'=>'角色分配成功，您可以继续操作']);
	 }
	 //验证用户是否拥有权限
	 // public function beforeAction($action)
  //   {
  //     $action = Yii::$app->controller->action->id; 
  //     //echo $action;die;
  //     if(\Yii::$app->user->can($action))
  //   	{ 
  //   		return true; 
  //   	}
  //     else
		// {
		//  throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限'); 
		// } 
  //  }
}

 ?>