<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\News_add;
use backend\models\News_cate;
class NewsController extends Controller
{     
	public $enableCsrfValidation=false;
	//新闻列表展示
	public function actionNews_list()
	{   
		$sql="select * from news_add";
		$data=Yii::$app->db->createCommand($sql)->queryAll();
		return $this->render('news_list',['data'=>$data]);
	}
	//新闻添加
	public function actionNews_add()
	{   
		 if(Yii::$app->request->post())
		 {
		 	
		 	$filename=$_FILES['img']['name'];//文件名
		 	$tmp_name=$_FILES['img']['tmp_name'];//临时文件
		 	$path='uploads/'.$filename;
		 	move_uploaded_file($tmp_name,$path );
           $data=Yii::$app->request->post();
           $data['img']=$path;
           $n=new News_add();
           $res=$n->insert($data);
           if($res)
           {
           	echo "<script>alert('添加成功啦');location.href='?r=news/news_list';</script>";
           }
           else
           {
           	echo "添加失败";
           }
		 }
		 else
		 {
		 return $this->render('news_add');	
		 }
	}
	 //删除
	  public function actionDel($id)
	  {
	  	
	  	$sql="delete from news_add  where id=$id";
	  	$res=Yii::$app->db->createCommand($sql)->execute();
	  	if($res)
	  	{
	  	 echo "<script>alert('删除成功');location.href='?r=news/news_list';</script>";	
	  	}
	  	else
	  	{
	  		echo "删除失败";
	  	}

	  }
	  //修改
	  public function actionUpdate()
	  {
	  	 $id=Yii::$app->request->get('id');
	  	 //echo $id;die;
	  	if(Yii::$app->request->post())
	  	{
	  		$data=Yii::$app->request->post();
	  		//print_r($data);die;
	  		$news_id=$data['news_id'];
	  		$title=$data['title'];
	  		$keys=$data['keys'];
	  		$add_man=$data['add_man'];
	  		$add_time=time();
	  		$res=Yii::$app->db
	  		->createCommand()
	  		->update('news_add',['title'=>$title,'keys'=>$keys,'add_man'=>$add_man,'add_time'=>$add_time],"id=".$news_id)
	  		->execute();
	  		//var_dump($res);die;
	  		if($res)
	  		{
	  			echo "<script>alert('修改成功');location.href='?r=news/news_list';</script>";
	  		}
	  		else
	  		{
	  			echo "修改失败";
	  		}

	  	}
	  	else
	  	{
         $sql="select * from news_add where id=$id";
         $row=Yii::$app->db->createCommand($sql)->queryOne();
        // print_r($row);die;
        return $this->render('update_form',['row'=>$row]);

	  	}
	  }
	  //搜索
	  	public function actionSearch()
	  	{
	  		$keys=Yii::$app->request->post('keys');
	  		$sql="select * from News_add where title like '%$keys%'";
	  		$data=Yii::$app->db->createCommand($sql)->queryAll();
	  		return $this->render('search',['data'=>$data]);
	  	}
	//新闻分类
	public function actionNews_cate()
	{
		$sql="select * from news_cate";
    	$data=Yii::$app->db->createCommand($sql)->queryAll();
    	$list=$this->actionCategory($data);
		return $this->render('news_cate',['list'=>$list]);
	}
    /**分类树
     * @$p_id 父级id
     * @$leve 层级关系
     * @return $arr
     */
    public function actionCategory($data,$p_id=0,$level=0)
    {
     static $arr=array();
     foreach ($data as $key => $value)
     {
     	if($value['p_id']==$p_id)
     	{
     		$value['level']=$level;
     		$arr[]=$value;
     		$this->actionCategory($data,$value['cate_id'],$level+1);
     	}
     }
     return $arr;
    }
	//添加修改分类
	public function actionCate_add()
	{ 
	      
		 if(Yii::$app->request->post())
		 {
           $data=Yii::$app->request->post();
           $n=new News_cate();
            $r=$n->insert($data);
           if($r)
           {
           	echo "<script>alert('添加成功啦');location.href='?r=news/cate_list';</script>";
           }
           else
           {
           	echo "添加失败";
           }
		 }
		 else
		 {
		 return $this->render('news_cate');	
		 }
	}
      //分类展示
	 public function actionCate_list()
	 {
	    $sql="select * from news_cate";
		$data=Yii::$app->db->createCommand($sql)->queryAll();
		return $this->render('cate_list',['data'=>$data]);	
	 }
}