<?php 
namespace backend\controllers;
use backend\controllers\RbacController;
use yii\data\Pagination;
use yii;
use backend\models\Article;
use common\components\CommonFunc;
use common\db\DBManage;
use common\AliPay\AlipayPay;
class ArticleController extends  RbacController
{   
	public $enableCsrfValidation=false;

    public function actionDataimport()
    {
    	//------1. 数据库备份（导出）------------------------------------------------------------  
    //分别是主机，用户名，密码，数据库名，数据库编码  
   $db = new DBManage ( 'localhost', 'root', 'root','jyw', 'utf8' ); 
   //var_dump($db);die; 
  // 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2000，即2M)  
  $db->backup('article',"backup/",2000);  
  // ------2. 数据库恢复（导入）------------------------------------------------------------  
  //参数：sql文件  
  //$db->restore ( 'backup/20120914122939_all_v1.sql');
    }
	//文章发布
	public function actionAdd()
	{    
		if(Yii::$app->request->post())
		{   
     
			if (!$_FILES['file']['tmp_name']||!$_FILES['file']['name'])
            {
            echo "<script>alert('请选择要上传的文件！');history.go(-1);location.reload();</script>";
            exit();
            }
         
		    $filename=basename($_FILES['file']['name']);//文件名
		   	$tmp_name=$_FILES['file']['tmp_name'];//临时文件
		   	$path='uploads/'.$filename;//设置文件上传路径
		   	move_uploaded_file($tmp_name,iconv("gb2312", "UTF-8",$path) );
			  $post_data=Yii::$app->request->post();
			   //print_r($post_data);die;
			   $post_data['img']=$path;

            $a=new Article();
            $res=$a->insert($post_data);
            if($res)
            {
             header("refresh:1 url=?r=article/show");
            }
            else
            {
            	echo "添加失败";
            }	
		}
		else
		{   
			 $sql="select * from article_type";
    	     $type_list=Yii::$app->db->createCommand($sql)->queryAll();
			return $this->render('wenzhang_xinwen_fabu',['type_list'=>$type_list]);
		}
		
	}
	//文章列表展示
	public function actionShow()
	{
		$a=new Article;
		$list=$a->articleList();
         $sql="select COUNT(*) from article,article_type where article.type_id=article_type.type_id";
         $count=Yii::$app->db->createCommand($sql)->queryScalar();//数据总条数
         $page_num=5;//每页显示的条数
        $page=isset($_GET['page'])?$_GET['page']:1;//当前页
         $total_page=ceil($count/$page_num);//总页数
         $limit=($page-1)*$page_num;//偏移量
         //上一页
        $up=$page-1<1?1:$page-1;
       //下一页
       $next=$page+1>$total_page?$total_page:$page+1;
		return $this->render('wenzhang_xinwen',
        ['list'=>$list,
        'total_page'=>$total_page,
        'page'=>$page,
        'up'=>$up,
        'next'=>$next,
        'count'=>$count,
        'page_num'=>$page_num
        ]);
	}
	//删除
	public function actionDelete($id)
	{
		 $a=new Article();
         $res=$a->delete($id);
         if($res)
         {
         	header("refresh:1 url=?r=article/show");
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
	  	if(Yii::$app->request->post())
	  	{
	  		$data=Yii::$app->request->post();
	  		$a_id=$data['a_id'];
	  		$title=$data['title'];
	  		$author=$data['author'];
	  		$res=Yii::$app->db
	  		->createCommand()
	  		->update('article',['title'=>$title,'author'=>$author],"id=".$a_id)
	  		->execute();
	  		if($res)
	  		{
	  			header("refresh:1 url=?r=article/show");
	  		}
	  		else
	  		{
	  			echo "修改失败";
	  		}

	  	}
	  	else
	  	{
         $sql="select * from article where id=$id";
         $row=Yii::$app->db->createCommand($sql)->queryOne();
        return $this->render('update_form',['row'=>$row]);

	  	}
	  }
	//及点及该
	  public function actionUp()
	  {
	  	$id=Yii::$app->request->get('id');
	  	$new_num=Yii::$app->request->get('new_num');
	  	$sql="update article set title='$new_num' where id=$id";
	  	$bool=Yii::$app->db->createCommand($sql)->execute();
	  	if($bool)
	  	{
         echo 0;
	  	}
	  	else
	  	{
         echo 1;
	  	}
	  }
	  //文章详情页
	  public function actionDetail($id)
	  {
        $sql = "SELECT * from article where id='$id'";
        $list_one = Yii::$app->db->createCommand($sql)->queryOne();
         return $this->render('detail',['list_one'=>$list_one]);
	  }
	/**
  * Excel  导出
  * 
  */
 public function actionImportexcel($id)
 {
  $sql = "SELECT * from article where id='$id'";
  $data = Yii::$app->db->createCommand($sql)->queryAll();
  $header = ["id", "标题", "作者","关键词","简介","内容","图片","时间"]; //导出excel的表头
  CommonFunc::exportData($data, $header, "表头", "文件名称");
 }
 
 
   //支付的方法
    public function actionAlipay()
    {
        $order_id = '200000001' . time();
        $gift_name = '元宝充值';
        $money = Yii::$app->request->get('money', 0.01);
        $body = '元宝充值测试';
        $show_url = 'http://www.phpman.cn';

   
        $alipay = new AlipayPay();
        $html = $alipay->requestPay($order_id, $gift_name, $money, $body, $show_url);
        echo $html;
    }
      //采集
      public function actionStr_substr($start, $end, $str) // 字符串截取函数
    {

        $temp = explode($start, $str, 2);
        print_r($temp);
        die;
        $content = explode($end, $temp[1], 2);
        return $content[0];
    }




    function actionIndex()
    {
        $str = file_get_contents("https://www.qunar.com/?tab=hotel&ex%20track=auto%204e0d874a");
        $name=$this->actionStr_substr("<p class=\"right-title-main\">", "</p>", $str);
        print_r($name);die;
        $name_s=$this->actionStr_substr("<span>", "</span>", $name);
        echo '景点名称：'.$name_s;
        echo '</br>';
        $desc=$this->actionStr_substr(" <p class=\"body-right-bottom-words\">", "</p>", $str);
        $desc_s=$this->actionStr_substr("<span>", "</span>", $desc);
        echo '景点描述：'.$desc_s;
        echo '</br>';
        $img=$this->actionStr_substr('<img alt="'.$desc_s.'" src="','" />', $str);
        echo '景点图片：'.$img;
        echo '</br>';
        $maney=$this->actionStr_substr('<span class="market-price">','</span>', $str);
        echo '市场价：'.$maney;
   }
 } 

 ?>