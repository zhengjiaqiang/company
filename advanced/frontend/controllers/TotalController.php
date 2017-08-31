<?php 
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Regist;
use yii\data\Pagination;
use yii;
class TotalController extends Controller
{   
	public $enableCsrfValidation=false;
	
	public function actionNums()
	{ 
      //访问用户的统计
        $a= file_get_contents('http://www.ip138.com/ip2city.asp');//[221.221.160.247]
        preg_match('/.*\[(.*)\].*/',$a,$ip);
        $ips=$ip[1];//登录ip
        $ipContent   = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js");
       // print_r($ipContent)."<br/>";
        $jsonData = explode("=",$ipContent);
       // print_r($jsonData)."<br/>";
        $jsonAddress = substr($jsonData[1], 0, -1);
          // print_r($jsonAddress)."<br/>";
        $data = json_decode($jsonAddress,true);
        $area = $data['province'].",".$data['city'];
        $date=time();
        $sql="insert into total (vs_ip,vs_time,area) values('$ips','$date','$area')";
        $res=Yii::$app->db->createCommand($sql)->execute();
        if($res)
        {
          return $this->redirect('?r=total/show');
        }

	}
   //统计展示页面
    public function actionShow()
    {
     
      $sql="select * from total ";
      $list=Yii::$app->db->createCommand($sql)->queryAll();
      //print_r($list);die;
      return $this->render('show_nums',['list'=>$list]);
    }
	 
}

 ?>