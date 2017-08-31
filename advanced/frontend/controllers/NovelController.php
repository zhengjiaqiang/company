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
class NovelController extends Controller
{   
	public $enableCsrfValidation=false;
	//分类与笑话管理
	public function actionIndex()
	{
	  echo "<center>";
	  echo "<a href='?r=novel_type/addtype'>分类管理</a>".
	  "&nbsp;&nbsp;&nbsp;"."<a href='?r=novel/show'>笑话管理</a>";
	  echo "</center>";
	}
	//列表展示
	public function actionShow()
	{
		$data=Novel::find();
        //设置展示 条数
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);
		$res = $data->joinWith(['novel_type'])->offset($pages->offset)->limit($pages->limit)->asArray()->all();
		 foreach ($res as &$val)
		  {
		    $novel_id=explode(',', $val['novel_id']);
		    //print_r($novel_id);die;
		    $str='';
		   foreach ($novel_id as $value) 
		   {
		   $info=Novel_type::find()->where(['novel_id'=>$value])->asArray()->one();
            $str.=','.$info['type_name'];
		   }
		   $str=ltrim($str,',');
		    $val['type_name']=$str;
		 }
		return $this->render('show',['res'=>$res,'pages'=>$pages]);
	}
	//添加笑话
	public function actionAdd()
	{
		if(Yii::$app->request->post('Novel'))
       {
         $c=new Novel();
         $data=Yii::$app->request->post('Novel');
         $c->novel_name=$data['novel_name'];
         $c->author=$data['author'];
         $c->desc=$data['desc'];
         $ids=implode(',', $data['novel_id']);//所属分类
         $c->novel_id=$ids;
         $c->is_check=$data['is_check'];
         $res=$c->save();
         //var_dump($res);die;
         if($res)
         {
         return $this->redirect('?r=novel/show');
         }
      }
      else
       {
         $c=new Novel();
         $result=Novel_type::find()->asArray()->all();
         $arr=array();
         foreach ($result as $key => $value)
          {
         	$arr[$value['novel_id']]=$value['type_name'];
          }
          $models=$arr;
         return $this->render('form',['model'=>$c,'models'=>$models]);
       }
	}
	
	  //查看已审核的内容
	  public function actionCheck($id)
	  {
	  	$check_list=Novel::find()->where(['id'=>$id])->asArray()->one();
	  	 return $this->render('check_list',['check_list'=>$check_list]);
	  }
	  //审核
	  public function actionUpdate()
	  {
	  	 
	  	$id=Yii::$app->request->get('id');
	  	if(Yii::$app->request->post('Novel'))
	  	{
         $data=Yii::$app->request->post('Novel');
         $u=Novel::findOne($data['id']);
         $u->novel_name=$data['novel_name'];
         $u->author=$data['author'];
         $u->is_check=$data['is_check'];
         $n_id=implode(',', $data['novel_id']);
         $u->novel_id=$n_id;
         $res=$u->save();
         //var_dump($res);die;
         if($res)
         {
         	echo "<script>alert('修改成功');location.href='?r=novel/show';</script>";
         }
         else
         {
         	echo '修改失败';
         }
	  	}
	  	else
	  	{   
	  		$model=new Novel;//model名
            $rows=Novel::find()->where(['id'=>$id])->asArray()->one();
            $ids=explode(',', $rows['novel_id']);
            //查询所有分类
             $types=Novel_type::find()->asArray()->all();
             $arr=array();
             foreach ($types as $key => $value)
             {
             	$arr[$value['novel_id']]=$value['type_name'];
             }
	  		return $this->render('update',['model'=>$model,'rows'=>$rows,'arr'=>$arr,'ids'=>$ids]);
	  	}
	  }
	 //讲一个
    public function actionSays()
    {
    	$says_list=Novel::find()->where(['id'=>2])->asArray()->one();
    	// print_r($says_list);die;
    	return $this->render('says',['says_list'=>$says_list]);
    }
	 //详情页
	 public function actionDetail()
	 {
	 	$id=Yii::$app->request->get('id');
	 	$row=Novel::find()->where(['id'=>$id])->asArray()->one();
	 	return $this->render('detail',['row'=>$row]);
	 }
	  //点赞
	 public function actionDing()
	 {
	 	$id=Yii::$app->request->get('id');
	 	$click_num=Yii::$app->request->get('click_num');
	 	//echo $id.','.$click_num;die;
	 	$c=Novel::findOne($id);
	 	$c->click_num=$click_num;
	 	$res=$c->save();
	 	if($res)
	 	{
	 		echo 0;
	 	}
	 	else
	 	{
	 		echo 1;
	 	}
	 }
	 //评论
	 public function actionComment()
	 {  
	 	$data=Yii::$app->request->post();
 		$n_id=Yii::$app->request->get('n_id');
 		$comment= new Comment;
 		$comment->n_id=$n_id;
 		$comment->content=$data['content'];
 		$comment->time=time();
 		 $res=$comment->save();
 		 if($res)
 		 {
 		 echo "<a href='?r=novel/comnlist&n_id=$n_id'>查看评论</a>";
 		 }
		 else
		 {
		  	echo "fail";
		  	die;
		 }
 		 
	 }
	 //评论展示页面
	  public function actionComnlist($n_id)
	  {
	  	$data=Comment::find()->where(['n_id'=>$n_id])->asArray()->all();
	  	return $this->render('commentlist',['data'=>$data]);
	  }
	 //登录
	 public function actionLogin()
	 {  
	 	if(Yii::$app->request->post('Regist'))
	 	{
	 		$data=Yii::$app->request->post('Regist');
	 		$uname=$data['uname'];
	 		$upwd=$data['upwd'];
	 		$row=Regist::find()->where(['uname'=>$uname,'upwd'=>$upwd])->asArray()->one();
	 		if($row)
	 		{   
	 			$session=Yii::$app->session;
	 			$session->open();
	 			$session->set('uname',$data['uname']);
	 			echo "<script>alert('ok');location.href='?r=novel/show';</script>";
	 		}
	 		 else
	 		 {
	 		 echo "<script>alert('该用户不存在,请注册');location.href='?r=novel/regist';</script>";	
	 		 }
	 	}
	 	else
	 	{
	 		$model=new Regist;
	 	   return $this->render('login',['model'=>$model]);
	 	}
	 	
	 }
	//注册
	public function actionRegist()
	{ 

		if(Yii::$app->request->post('Regist'))
	 	{
	 		$data=Yii::$app->request->post('Regist');
	 		$new_hobby=implode(',',$data['hobby']);
	 		$r=new Regist;
	 		$r->uname=$data['uname'];
	 		$r->upwd=$data['upwd'];
	 		$r->age=$data['age'];
	 		$r->hobby=$new_hobby;
	 		$row=$r->save();
	 		if($row)
	 		{
	 			echo "<script>alert('注册成功');location.href='?r=novel/login';</script>";
	 		}
	 		 else
	 		 {
	 		 echo "注册失败";	
	 		 }
	 	}
	 	else
	 	{	
		$model=new Regist;
	    return $this->render('regist',['model'=>$model]);
	 	}
	}
	
	public function actionHe($id,$status)
	{
      $s=Novel::find()->where(['id'=>$id,'is_check'=>$status])->asArray()->one();
      if($s['is_check']!=0)
      {
      	echo '未通过';
      }
      else
      {
       echo '已通过';
      }
	}
	public function actionLoginout()
	{
		$session=Yii::$app->session;
		$session->open();
		$session->destroy();
		return $this->redirect('?r=novel/login');
	}
	
}

 ?>