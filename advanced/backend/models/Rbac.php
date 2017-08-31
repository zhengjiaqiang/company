<?php 
namespace backend\models;
use yii\base\Model;
use yii;
use db;
class Rbac extends Model
{
	public $role;
	public $power;
	public $username;
	public function  attributeLabels()
	{
		return [
         'role'=>'角色',
         'power'=>'权限',
          'username'=>'用户'
		];
	}
	/**
	 * @param $data [二维数组]
	 * @param $key  
	 * @param $value
	 * return $arr;
	 */
	public static function one_array($data,$key,$val)
	{ 
		//print_r($data);die;
		$arr=array();
      foreach ($data as  $value)
       {
      	$arr[$value[$key]]=$value[$val];
       }
       return $arr;
	}
	//查询角色
	public  static function getroles()
	{
		$sql="select name from  auth_item  where type=1";
	    $roles=Yii::$app->db->createCommand($sql)->queryAll();
		$arr=array();
		foreach ($roles as $key => $value)
		{
			$arr[$value['name']]=$value['name'];
		}
       return $arr;
	}
	//查询权限
	public  static function getpowers()
	{
		$sql="select name from  auth_item  where type=2";
	    $powers=Yii::$app->db->createCommand($sql)->queryAll();
		$arr=array();
		foreach ($powers as $key => $value)
		{
			$arr[$value['name']]=$value['name'];
		}
       return $arr;

	}
	//查询用户
	public  static function getuser()
	{
		$sql="select id,username from  user ";
		$u=Yii::$app->db->createCommand($sql)->queryAll();
		//return $u;die;
		$arr=array();
		foreach ($u as $key => $value)
		{
			$arr[$value['id']]=$value['username'];
		}
       return $arr;
	}
	//给角色分配权限
	public static function rolepower($role,$power)
	{
		 $arr=array();
		foreach ($role as $value) 
		{
			foreach ($power as  $v) 
			{
			 $arr[]=array($value,$v);
			}
		}
		return $arr;
	}
	//给用户分配角色
	public static function useroles($role,$username)
	{
		 $arr=array();
		foreach ($role as $value) 
		{
			foreach ($username as  $v) 
			{
			 $arr[]=array($value,$v);
			}
		}
		return $arr;
	}

}


 ?>
    